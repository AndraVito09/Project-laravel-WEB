document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function (e) {
      if (!confirm('Apakah data yakin ingin dihapus?')) {
        e.preventDefault();

      }
    });
  });
  
});
