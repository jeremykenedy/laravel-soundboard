<script>
(function() {
    function classToggle() {
        this.classList.toggle('checked');
        var radios = document.getElementsByName('status');
        for (var i = 0, length = radios.length; i < length; i++)
        {
         if (radios[i].value == 1)
            {
                radios[i].value = 0;
            } else {
                radios[i].value = 1;
            }
        }
    }
    document.querySelector('.switch').addEventListener('click', classToggle);
})();
</script>