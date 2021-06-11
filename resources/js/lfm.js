export default function(id, type) {
  const button = document.getElementById(id);

  button.addEventListener('click', function () {
    let target_input = document.getElementById(button.getAttribute('data-input'));
    let target_preview = document.getElementById(button.getAttribute('data-preview'));

    window.open('/filemanager?type=' + type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = function (items) {
      var file_path = items.map(function (item) {
        return item.url;
      }).join(',');

      // set the value of the desired input to image url
      target_input.value = file_path;
      target_input.dispatchEvent(new Event('change'));

      items.forEach(function (item) {
        target_preview.setAttribute('src', item.thumb_url)
      });

      // trigger change event
      target_preview.dispatchEvent(new Event('change'));
    };
  });
};