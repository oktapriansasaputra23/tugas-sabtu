<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Flowchart Builder — Full (Export/Import/PNG/PDF/MiniMap/Toolbar)</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- jsPlumb -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsPlumb/2.15.6/js/jsplumb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- html2canvas & jsPDF for export -->
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<style>
  body { background:#f4f6f9; }
  .app { height:100vh; display:flex; gap:12px; padding:12px; }
  #left {
    width:260px; background:#fff; border-radius:8px; padding:12px; box-shadow:0 6px 18px rgba(0,0,0,.06);
    overflow:auto;
  }
  #center {
    flex:1; display:flex; flex-direction:column;
  }
  #toolbar-top { display:flex; gap:8px; margin-bottom:8px; align-items:center; }
  #canvas {
    flex:1; background:#fff; border:2px dashed #d0d7df; border-radius:8px; position:relative; overflow:auto;
    padding:18px;
  }

  /* shapes */
  .node {
    position:absolute; user-select:none; cursor:move; display:inline-block; box-sizing:border-box;
    padding:10px 14px; border:2px solid rgba(0,0,0,.12); font-weight:600; text-align:center;
  }
  .node.process { border-radius:8px; background:#c7f3ff; color:#0c3b66; }
  .node.start, .node.end { border-radius:40px; background:#dbffd8; color:#114b0f; padding:8px 18px; }
  .node.decision {
    width:120px; height:120px; transform:rotate(45deg); display:flex; align-items:center; justify-content:center;
    background:#fff1bd; color:#5d4300;
  }
  .node.decision .inner { transform:rotate(-45deg); width:100%; display:block; }
  .node.io { background:#ffd6c9; transform:skewX(-18deg); color:#5a2a12; }
  .node.io .inner { transform:skewX(18deg); display:block; }

  /* selected */
  .node.selected { box-shadow:0 8px 20px rgba(0,0,0,.12); border-color:#0d6efd; }

  /* delete button */
  .node .btn-del {
    position:absolute; top:-10px; right:-10px; background:#dc3545; color:#fff; border-radius:50%;
    width:22px; height:22px; display:flex; align-items:center; justify-content:center; cursor:pointer; font-size:12px;
    border: none;
  }

  /* node toolbar floating */
  #node-toolbar {
    position:absolute; z-index:9999; display:none; gap:6px; padding:6px; background:rgba(255,255,255,0.95);
    border-radius:8px; box-shadow:0 8px 20px rgba(0,0,0,.12); border:1px solid #eee;
  }

  /* minimap */
  #minimap {
    width:220px; height:160px; border:1px solid #ddd; background:#fff; overflow:hidden; position:relative;
  }
  #mini-canvas {
    transform-origin:top left;
    position:absolute; left:0; top:0;
  }

  /* small helpers */
  .palette-item { cursor:pointer; margin-bottom:8px; border-radius:6px; padding:10px; border:1px solid #eee; }
  .small { font-size:13px; }

  textarea { font-family: monospace; }
</style>
</head>
<body>

<div class="app container-fluid">

  <!-- LEFT: palette + export/import + minimap -->
  <div id="left">
    <h5 class="mb-2">Elements</h5>

    <div id="palette">
      <div class="palette-item" data-type="start">🟢 Start</div>
      <div class="palette-item" data-type="process">📄 Process</div>
      <div class="palette-item" data-type="decision">🔷 Decision</div>
      <div class="palette-item" data-type="io">⬓ Input/Output</div>
      <div class="palette-item" data-type="end">🔴 End</div>
    </div>

    <hr>

    <h6 class="small">Canvas Controls</h6>
    <div class="d-flex gap-2 mb-2">
      <button class="btn btn-primary btn-sm" id="btn-add">Add Node</button>
      <button class="btn btn-secondary btn-sm" id="btn-clear">Clear</button>
    </div>

    <div class="mb-2">
      <label class="form-label small mb-1">Zoom</label>
      <div class="d-flex gap-1">
        <button class="btn btn-light btn-sm" id="zoom-out">-</button>
        <button class="btn btn-light btn-sm" id="zoom-reset">100%</button>
        <button class="btn btn-light btn-sm" id="zoom-in">+</button>
      </div>
    </div>

    <hr>

    <h6 class="small">Export / Import</h6>
    <div class="d-grid gap-2 mb-2">
      <button class="btn btn-outline-primary btn-sm" id="export-json">Export JSON</button>
      <button class="btn btn-outline-success btn-sm" id="import-json-btn">Import JSON</button>
      <input type="file" id="import-json-file" accept=".json" style="display:none">
      <button class="btn btn-outline-dark btn-sm" id="export-png">Export PNG</button>
      <button class="btn btn-outline-dark btn-sm" id="export-pdf">Export PDF</button>
    </div>

    <hr>

    <h6 class="small">Mini Map</h6>
    <div id="minimap">
      <div id="mini-canvas"></div>
    </div>

    <hr>

    <h6 class="small">Raw JSON (debug)</h6>
    <textarea id="debug-json" rows="6" class="form-control small" readonly></textarea>
  </div>

  <!-- CENTER: top toolbar + canvas -->
  <div id="center">
    <div id="toolbar-top">
      <div class="me-auto">
        <button class="btn btn-outline-secondary btn-sm" id="btn-export-quick">Quick Export JSON</button>
      </div>
      <div class="d-flex gap-2">
        <input id="search-node" class="form-control form-control-sm small" placeholder="Search node text...">
      </div>
    </div>

    <div id="canvas"></div>
  </div>

</div>

<!-- floating node toolbar -->
<div id="node-toolbar">
  <button class="btn btn-sm btn-light" id="tb-duplicate" title="Duplicate">⧉</button>
  <button class="btn btn-sm btn-light" id="tb-delete" title="Delete">✕</button>
  <button class="btn btn-sm btn-light" id="tb-increase" title="Increase">A+</button>
  <button class="btn btn-sm btn-light" id="tb-decrease" title="Decrease">A-</button>
  <input type="color" id="tb-color" style="width:40px;height:30px;padding:0;border:0;" title="Change color">
</div>

<script>
/* -------------------------
   Initialization
------------------------- */
const instance = jsPlumb.getInstance({
  Connector: ["Flowchart", { cornerRadius: 6 }],
  Anchors: ["Continuous", "Continuous"],
  Endpoint: ["Dot", { radius: 4 }],
  PaintStyle: { stroke:"#0d6efd", strokeWidth:3 },
  HoverPaintStyle: { stroke:"#ff8c00", strokeWidth:4 },
  ConnectionOverlays: [["Arrow",{width:12,length:12,location:1}]],
  Container: "canvas"
});
let count = 0;
let scale = 1;
let selectedNodeId = null;
let selectedConnection = null;

/* helper to create HTML for nodes by type */
function nodeHTML(id, type, text) {
  text = text || (type === 'start' ? 'Start' : type === 'end' ? 'End' : type==='decision' ? 'Decision' : type==='io' ? 'Input/Output' : 'Process');
  if (type === 'decision') {
    return `<div class="node decision" id="${id}" data-type="${type}" data-scale="1">
              <button class="btn-del btn-del-sm" style="display:none;">✕</button>
              <div class="inner" contenteditable="false">${text}</div>
            </div>`;
  } else if (type === 'io') {
    return `<div class="node io" id="${id}" data-type="${type}" data-scale="1">
              <button class="btn-del btn-del-sm" style="display:none;">✕</button>
              <div class="inner" contenteditable="false">${text}</div>
            </div>`;
  } else {
    return `<div class="node ${type}" id="${id}" data-type="${type}" data-scale="1">
              <button class="btn-del btn-del-sm" style="display:none;">✕</button>
              <div class="inner" contenteditable="false">${text}</div>
            </div>`;
  }
}

/* create & bind node (draggable + endpoints + events) */
function createNode(type, x = 100, y = 100, text) {
  count++;
  const id = "node" + count;
  $("#canvas").append(nodeHTML(id, type, text));
  const $el = $("#" + id);
  $el.css({ left: x + "px", top: y + "px" });

  // show delete button on hover
  $el.on("mouseenter", function(){ $(this).find(".btn-del").show(); });
  $el.on("mouseleave", function(){ $(this).find(".btn-del").hide(); });

  // delete button
  $el.find(".btn-del").on("click", function(e){
    e.stopPropagation();
    removeNode(id);
  });

  // selection
  $el.on("click", function(e){
    e.stopPropagation();
    selectNode(id);
  });

  // double click to edit text (disables dragging while editing)
  $el.on("dblclick", function(e){
    e.stopPropagation();
    const inner = $(this).find(".inner");
    inner.attr("contenteditable", "true").addClass("editing").focus();

    // disable dragging while editing
    instance.setDraggable(id, false);
  });

  // prevent dragging when clicking inner
  $el.on("mousedown", ".inner", function(e){
    e.stopPropagation();
  });

  // finish editing
  $el.on("blur", ".inner", function(){
    $(this).removeAttr("contenteditable").removeClass("editing");
    instance.setDraggable(id, true);
    updateDebug();
    updateMiniMap();
  });

  // make draggable & connectable via jsPlumb
  instance.draggable(id, { containment: true });

  // endpoints (source & target)
  instance.makeSource(id, {
    filter: ".inner, .node",
    anchor: "Continuous",
    connectorStyle: { stroke:"#0d6efd", strokeWidth:3 },
    connector: ["Flowchart"],
    maxConnections: -1
  });
  instance.makeTarget(id, {
    anchor: "Continuous",
    allowLoopback: false
  });

  // re-render connections when moved
  instance.bind("drag", function(params){ instance.repaintEverything(); updateMiniMap(); });

  updateDebug();
  updateMiniMap();
  return id;
}

/* remove node + its endpoints + connections */
function removeNode(id){
  instance.removeAllEndpoints(id);
  $("#" + id).remove();
  if (selectedNodeId === id) selectedNodeId = null;
  updateDebug();
  updateMiniMap();
}

/* select node (show floating toolbar) */
function selectNode(id){
  selectedNodeId = id;
  $(".node").removeClass("selected");
  $("#" + id).addClass("selected");
  showNodeToolbar(id);
}

/* toolbar: duplicate, delete, resize, color */
const tb = $("#node-toolbar");
function showNodeToolbar(id){
  const node = $("#" + id);
  if (!node.length) { tb.hide(); return; }
  const offset = node.offset();
  tb.css({ left: offset.left + node.outerWidth() + 8, top: offset.top }).show();
  // set color picker initial
  const bg = node.css("background-color");
  $('#tb-color').val(rgbToHex(bg));
  // attach handlers (done globally below)
}

/* hide toolbar if clicked outside */
$(document).on("click", function(e){
  if(!$(e.target).closest(".node, #node-toolbar").length){
    $(".node").removeClass("selected");
    selectedNodeId = null;
    tb.hide();
  }
});

/* Convert rgb to hex helper */
function rgbToHex(rgb){
  const m = rgb.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)/);
  if(!m) return "#ffffff";
  return "#" + ((1<<24) + (parseInt(m[1])<<16) + (parseInt(m[2])<<8) + parseInt(m[3])).toString(16).slice(1);
}

/* duplicate node */
$("#tb-duplicate").on("click", function(){
  if(!selectedNodeId) return;
  const src = $("#" + selectedNodeId);
  const type = src.data("type");
  const text = src.find(".inner").text();
  const pos = src.position();
  const nid = createNode(type, pos.left + 20, pos.top + 20, text);
  // copy background color & scale
  $("#" + nid).css("background", src.css("background"));
  updateMiniMap();
});

/* delete via toolbar */
$("#tb-delete").on("click", function(){
  if(!selectedNodeId) return;
  removeNode(selectedNodeId);
  tb.hide();
});

/* resize font bigger/smaller */
$("#tb-increase").on("click", function(){
  if(!selectedNodeId) return;
  const n = $("#" + selectedNodeId);
  const cur = parseFloat(n.data("scale") || 1);
  const next = Math.min(2, cur + 0.1);
  n.css("transform", "scale(" + next + ")");
  n.data("scale", next);
  instance.repaintEverything();
  updateMiniMap();
});
$("#tb-decrease").on("click", function(){
  if(!selectedNodeId) return;
  const n = $("#" + selectedNodeId);
  const cur = parseFloat(n.data("scale") || 1);
  const next = Math.max(0.6, cur - 0.1);
  n.css("transform", "scale(" + next + ")");
  n.data("scale", next);
  instance.repaintEverything();
  updateMiniMap();
});

/* color picker */
$("#tb-color").on("input", function(){
  if(!selectedNodeId) return;
  const c = $(this).val();
  $("#" + selectedNodeId).css("background", c);
  instance.repaintEverything();
  updateMiniMap();
});

/* click palette to add node at canvas top-left */
$(".palette-item").on("click", function(){
  const type = $(this).data("type");
  createNode(type, 120 + (count%5)*20, 120 + Math.floor(count/5)*20);
});

/* quick add */
$("#btn-add").on("click", function(){ createNode('process', 150 + (count%6)*20, 150 + Math.floor(count/6)*20); });

/* clear canvas */
$("#btn-clear").on("click", function(){
  if(!confirm("Clear canvas?")) return;
  // remove all
  $("#canvas").empty();
  instance.reset();
  count = 0;
  selectedNodeId = null;
  updateDebug();
  updateMiniMap();
});

/* export JSON */
function exportJSON(){
  const nodes = [];
  $(".node").each(function(){
    const id = $(this).attr("id");
    const pos = $(this).position();
    nodes.push({
      id, type: $(this).data("type"), left: pos.left, top: pos.top,
      text: $(this).find(".inner").text(),
      bg: $(this).css("background"),
      scale: $(this).data("scale") || 1
    });
  });

  const connections = [];
  instance.getAllConnections().forEach(c=>{
    connections.push({ source:c.sourceId, target:c.targetId });
  });

  const payload = { nodes, connections };
  $("#debug-json").val(JSON.stringify(payload, null, 2));
  return payload;
}

$("#export-json, #btn-export-quick").on("click", function(){
  const data = exportJSON();
  const blob = new Blob([JSON.stringify(data, null, 2)], {type:"application/json"});
  const url = URL.createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url; a.download = "flow.json"; a.click();
  URL.revokeObjectURL(url);
});

/* import JSON from file */
$("#import-json-btn").on("click", function(){ $("#import-json-file").click(); });
$("#import-json-file").on("change", function(e){
  const f = e.target.files[0];
  if(!f) return;
  const reader = new FileReader();
  reader.onload = function(ev){
    try {
      const obj = JSON.parse(ev.target.result);
      loadFromJSON(obj);
    } catch(err){
      alert("Invalid JSON");
    }
  };
  reader.readAsText(f);
});

/* load from JSON */
function loadFromJSON(obj){
  // clear
  $("#canvas").empty();
  instance.reset();
  count = 0;
  selectedNodeId = null;

  // create nodes
  (obj.nodes || []).forEach(n=>{
    // increment count to maintain unique ids
    count = Math.max(count, parseInt(n.id.replace('node','')) || 0);
    // create node with given id by temporarily adjusting count and then rename
    const nid = createNode(n.type, n.left, n.top, n.text);
    // apply style
    $("#" + nid).css("background", n.bg);
    $("#" + nid).data("scale", n.scale || 1);
    $("#" + nid).css("transform", "scale(" + (n.scale||1) + ")");
  });

  // connect after a short timeout to ensure endpoints exist
  setTimeout(()=>{
    (obj.connections || []).forEach(conn=>{
      try {
        instance.connect({ source: conn.source, target: conn.target });
      } catch(e){
        console.warn("connect error", e);
      }
    });
    updateDebug();
    updateMiniMap();
  }, 200);
}

/* Export PNG & PDF */
$("#export-png").on("click", function(){
  // snapshot canvas (without minimap/toolbar)
  // temporarily hide selection outlines
  $(".selected").removeClass("selected");
  html2canvas(document.getElementById("canvas"), { scale: 2 }).then(canvas=>{
    const url = canvas.toDataURL("image/png");
    const a = document.createElement("a");
    a.href = url; a.download = "flow.png"; a.click();
  });
});
$("#export-pdf").on("click", function(){
  html2canvas(document.getElementById("canvas"), { scale: 2 }).then(canvas => {
    const imgData = canvas.toDataURL('image/png');
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF({
      orientation: canvas.width > canvas.height ? 'landscape' : 'portrait',
      unit: 'px',
      format: [canvas.width, canvas.height]
    });
    pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);
    pdf.save('flow.pdf');
  });
});

/* manage connection selection & delete via DEL key */
instance.bind("click", function(conn, originalEvent){
  // highlight connection (simple)
  selectedConnection = conn;
  // deselect nodes
  $(".node").removeClass("selected");
  selectedNodeId = null;
  tb.hide();
});

$(document).keydown(function(e){
  if(e.key === "Delete" || e.key === "Backspace"){
    if(selectedConnection){
      instance.deleteConnection(selectedConnection);
      selectedConnection = null;
      updateDebug();
      updateMiniMap();
      return;
    }
    if(selectedNodeId){
      removeNode(selectedNodeId);
      tb.hide();
      return;
    }
  }
});

/* repaint on connect/disconnect */
instance.bind("connection", function(info){
  updateDebug(); updateMiniMap();
});
instance.bind("connectionDetached", function(){
  updateDebug(); updateMiniMap();
});
instance.bind("connectionMoved", function(){
  updateDebug(); updateMiniMap();
});

/* search nodes */
$("#search-node").on("input", function(){
  const q = $(this).val().toLowerCase();
  $(".node").each(function(){
    const txt = $(this).find(".inner").text().toLowerCase();
    $(this).toggle(txt.indexOf(q) !== -1);
  });
});

/* zoom controls */
function setScale(s){
  scale = s;
  $("#canvas").css("transform", "scale(" + s + ")");
  $("#canvas").css("transform-origin", "top left");
  // adjust canvas container height so scroll still works
  updateMiniMap();
}
$("#zoom-in").on("click", ()=> setScale(Math.min(2, scale + 0.1)));
$("#zoom-out").on("click", ()=> setScale(Math.max(0.5, scale - 0.1)));
$("#zoom-reset").on("click", ()=> setScale(1));

/* Update debug JSON text area */
function updateDebug(){ $("#debug-json").val(JSON.stringify(exportJSON(), null, 2)); }

/* MiniMap: clone node positions scaled down */
function updateMiniMap(){
  const $mini = $("#mini-canvas");
  $mini.empty();
  const canvasOffset = $("#canvas").offset();
  const canvasW = $("#canvas").outerWidth();
  const canvasH = $("#canvas").outerHeight();
  const scaleFactor = Math.min(200 / canvasW, 140 / canvasH, 1);
  // clone nodes simple
  $(".node").each(function(){
    const id = $(this).attr("id");
    const pos = $(this).position();
    const w = $(this).outerWidth();
    const h = $(this).outerHeight();
    const bg = $(this).css("background-color");
    const text = $(this).find(".inner").text();

    const mini = $("<div>").css({
      position:"absolute",
      left: Math.round(pos.left * scaleFactor) + "px",
      top: Math.round(pos.top * scaleFactor) + "px",
      width: Math.max(20, Math.round(w * scaleFactor)) + "px",
      height: Math.max(10, Math.round(h * scaleFactor)) + "px",
      background: bg,
      border:"1px solid #ddd",
      fontSize:"10px",
      overflow:"hidden",
      padding:"2px",
      boxSizing:"border-box",
      borderRadius:4
    }).text(text);

    $mini.append(mini);
  });

  $mini.css("transform", "scale("+scaleFactor+")");
  $mini.css("transform-origin","top left");
}

/* initial example nodes */
$(function(){
  createNode('start', 60, 40);
  createNode('process', 260, 80);
  createNode('decision', 480, 80);
  createNode('process', 700, 120);
  createNode('end', 900, 150);
  // connect some
  setTimeout(()=>{
    try{ instance.connect({ source:'node1', target:'node2' }); }catch(e){}
    try{ instance.connect({ source:'node2', target:'node3' }); }catch(e){}
    updateDebug(); updateMiniMap();
  }, 200);
});

</script>

</body>
</html>
