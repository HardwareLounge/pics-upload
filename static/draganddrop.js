function errorModal(title, message) {
  console.warn("Error title: " + title + "\nError message: " + message);
  $('#errorModalTitle').html(title);
  $('#errorModalMessage').html(message);
  $('#errorModal').modal('show');
}

function dropHandler(ev) {
  console.log('File(s) dropped');

  // Prevent default behavior (Prevent file from being opened)
  ev.preventDefault();

  if (ev.dataTransfer.items) {
    // Use DataTransferItemList interface to access the file(s)

    if(ev.dataTransfer.items.length == 1) {
      // Do nothing if data is not file

      if (ev.dataTransfer.items[0].kind === 'file') {
        var file = ev.dataTransfer.items[0].getAsFile();
        document.getElementById('imageFile').files = ev.dataTransfer.files;
        console.log("File name: " + file.name);

        $('#uploadModal').modal('show');
      }

    } else {
      // More than one file provided

      errorModal("Fehler beim Hochladen des Bildes", "Du kannst nur jeweils ein Bild hochladen.")
    }
  } else {
    // Use DataTransfer interface to access the file(s)
    for (var i = 0; i < ev.dataTransfer.files.length; i++) {
      console.log('... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
    }
  }
}

function dragOverHandler(ev) {
  // Prevent default behavior (Prevent file from being opened)
  ev.preventDefault();
}

document.getElementById('content').ondrop = dropHandler;
document.getElementById('content').ondragover = dragOverHandler;

$('#uploadModal').on('shown.bs.modal', function () {
  $('#titleText').trigger('focus')
})

$('#errorModal').on('hidden.bs.modal', function () {
  $('#errorModalTitle').html("");
  $('#errorModalMessage').html("");
})
