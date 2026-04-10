<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Builder + Generate HTML</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body { background: #f8f9fa; }
    .sidebar {
      background: #fff; height: 100vh; padding: 15px; border-right: 1px solid #ddd;
    }
    .form-element {
      padding: 10px; cursor: grab; border: 1px dashed #aaa; border-radius: 8px;
      background: #f1f3f5; margin-bottom: 10px; transition: .2s;
    }
    .form-element:hover { background: #e9ecef; }
    .canvas { min-height: 100vh; padding: 20px; border: 2px dashed #aaa; border-radius: 10px; background: #fff; }
    .field-box {
      background: #fdfdfd; padding: 12px; border: 1px solid #ddd;
      border-radius: 8px; margin-bottom: 10px; position: relative;
    }
    .delete-btn {
      position: absolute; top: 8px; right: 10px; cursor: pointer; color: red;
    }
  </style>
</head>

<body>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <div class="col-md-3 sidebar">
      <h5 class="fw-bold"><i class="fa fa-bars"></i> Elemen Form</h5>

      <div class="form-element" draggable="true" data-type="text">Text Input</div>
      <div class="form-element" draggable="true" data-type="email">Email</div>
      <div class="form-element" draggable="true" data-type="number">Number</div>
      <div class="form-element" draggable="true" data-type="textarea">Textarea</div>
      <div class="form-element" draggable="true" data-type="select">Dropdown</div>
      <div class="form-element" draggable="true" data-type="checkbox">Checkbox</div>
      <div class="form-element" draggable="true" data-type="radio">Radio Button</div>
      <div class="form-element" draggable="true" data-type="date">Date Picker</div>

      <button id="generateBtn" class="btn btn-primary mt-3 w-100">
        <i class="fa fa-code"></i> Generate HTML
      </button>
    </div>

    <!-- Canvas -->
    <div class="col-md-9">
      <div id="canvas" class="canvas">
        <p class="text-muted" id="placeholder">
          Drag & drop elemen form ke sini...
        </p>
      </div>

      <!-- Result -->
      <div class="mt-4">
        <h5 class="fw-bold"><i class="fa fa-file-code"></i> Kode HTML:</h5>
        <textarea id="output" class="form-control" rows="12" readonly></textarea>
      </div>
    </div>

  </div>
</div>

<script>
  const elements = document.querySelectorAll(".form-element");
  const canvas = document.getElementById("canvas");
  const placeholder = document.getElementById("placeholder");
  const output = document.getElementById("output");

  elements.forEach(el => {
    el.addEventListener("dragstart", e => {
      e.dataTransfer.setData("type", el.getAttribute("data-type"));
    });
  });

  canvas.addEventListener("dragover", e => e.preventDefault());

  canvas.addEventListener("drop", e => {
    e.preventDefault();
    const type = e.dataTransfer.getData("type");
    placeholder.style.display = "none";

    let field = document.createElement("div");
    field.classList.add("field-box");

    field.innerHTML = generateField(type) + `
      <i class="fa fa-times delete-btn"></i>
    `;

    field.querySelector(".delete-btn").addEventListener("click", () => field.remove());

    canvas.appendChild(field);
  });

  function generateField(type) {
    switch(type){
      case "text": return `<label>Text Input</label><input type="text" class="form-control">`;
      case "email": return `<label>Email</label><input type="email" class="form-control">`;
      case "number": return `<label>Number</label><input type="number" class="form-control">`;
      case "textarea": return `<label>Textarea</label><textarea class="form-control"></textarea>`;
      case "select": return `<label>Dropdown</label>
          <select class="form-control"><option>Option 1</option><option>Option 2</option></select>`;
      case "checkbox": return `<label><input type="checkbox"> Checkbox</label>`;
      case "radio": return `<label><input type="radio"> Radio Button</label>`;
      case "date": return `<label>Date Picker</label><input type="date" class="form-control">`;
    }
  }

  // GENERATE HTML
  document.getElementById("generateBtn").addEventListener("click", () => {
    let html = "";

    document.querySelectorAll(".field-box").forEach(field => {
      html += field.innerHTML
        .replace('<i class="fa fa-times delete-btn"></i>', "")
        .trim() + "\n\n";
    });

    output.value = html;
  });
</script>

</body>
</html>
