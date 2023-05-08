var showingSourceCode = false;
var isInEditMode = true;

function enableEditMode() {
  richTextField.document.designMode = "on";
}
function execCmd(command) {
  richTextField.document.execCommand(command, false, null);
}
function execCommandWithArg(command, arg) {
  richTextField.document.execCommand(command, false, arg);
}

function toggleSource() {
  let htmlCode =
    richTextField.document.getElementsByTagName("body")[0].innerHTML;
  console.log(htmlCode);

  if (showingSourceCode) {
    richTextField.document.getElementsByTagName("body")[0].innerHTML =
      richTextField.document.getElementsByTagName("body")[0].textContent;
    showingSourceCode = false;
  } else {
    richTextField.document.getElementsByTagName("body")[0].textContent =
      richTextField.document.getElementsByTagName("body")[0].innerHTML;
    showingSourceCode = true;
  }
}
function toggleEdit() {
  if (isInEditMode) {
    richTextField.document.designMode = "off";

    isInEditMode = false;
  } else {
    isInEditMode = true;
    richTextField.document.designMode = "on";
  }
}

//get iframe content

// let getIframeDocButton = document.getElementById("getIframeDocButton")
//getIframeDocButton.addEventListener("click", () => {
//  let iframe = document.getElementById("rich-text-editor")
//let iframeContent = iframe.contentWindow.document.body.innerHTML
//let myTextarea = document.getElementById('my-content')
//myTextarea.value = iframeContent

// console.log(iframeContent, myTextarea)
//})

let contentForm = document.getElementById("content-form");
contentForm.addEventListener("submit", () => {
  let iframe = document.getElementById("rich-text-editor");
  let iframeContent = iframe.contentWindow.document.body.innerHTML;
  let myContentInput = document.getElementById("my-content");
  myContentInput.value = iframeContent;

  console.log(myContentInput.value);
});
