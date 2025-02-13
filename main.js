function loadTemplateFile(filename, callback) {
    fetch(filename)
      .then((response) => response.text())
      .then((html) => {
        callback(html);
      });
  }

  function insertTemplateIntoElement(template, elementId) {
    const element = document.getElementById(elementId);
    if (element) {
      element.innerHTML = template;
    }
  }
  
  loadTemplateFile('header.php', (template) => {
    insertTemplateIntoElement(template, 'header');
  });
  loadTemplateFile('footer.html', (template) => {
    insertTemplateIntoElement(template, 'footer');
  });

