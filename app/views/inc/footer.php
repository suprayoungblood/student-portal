</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
  integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
  integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/js/main.js"></script>
<script>
function applyPhoneMask(input) {
  const phonePattern = /(\d{1,3})(\d{1,3})?(\d{1,4})?/;
  input.value = input.value.replace(/\D/g, '').replace(phonePattern, function(_, p1, p2, p3) {
    return `(${p1 || ''}${p2 ? `)${p2}` : ''}${p3 ? `-${p3}` : ''}`;
  });
}

function applySsnMask(input) {
  const ssnPattern = /(\d{1,3})(\d{1,2})?(\d{1,4})?/;
  input.value = input.value.replace(/\D/g, '').replace(ssnPattern, function(_, p1, p2, p3) {
    return `${p1 || ''}${p2 ? `-${p2}` : ''}${p3 ? `-${p3}` : ''}`;
  });
}
</script>
</body>

</html>