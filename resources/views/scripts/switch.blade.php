<script>
/*
    $(function(){
        $('.switch').click(function(){
            $(this).toggleClass('checked');
            $('input[name="status"]').not(':checked').prop("checked", true);
        });
    });
*/

// document.addEventListener('click', function (event) {

//     // If the clicked element doesn't have the right selector, bail
//     if (!event.target.matches('.switch')) return;

//     // Don't follow the link
//     event.preventDefault();

//     // Log the clicked element in the console
//     console.log(event.target);

// }, false);
(function() {
   // your page initialization code here
   // the DOM will be available here

   console.log("I'm Ready!!");


    function classToggle() {
        this.classList.toggle('checked');

var radios = document.getElementsByName('status');

for (var i = 0, length = radios.length; i < length; i++)
{
 if (radios[i].checked)
 {
  // do whatever you want with the checked radio
  // alert(radios[i].value);

  radios[i].removeAttribute("checked");



  // only one radio can be logically checked, don't check the rest
  // break;
 } else {

    // radios[i].checked = false;


    radios[i].createAttribute("checked");

 }

    // console.log(radios[i].value);

}


    }
    document.querySelector('.switch').addEventListener('click', classToggle);

    // window.onload = function() {
    //     var anchors = document.getElementsByTagName('a');
    //     for(var i = 0; i < anchors.length; i++) {
    //         var anchor = anchors[i];
    //         if(/\bhohoho\b/).match(anchor.className)) {
    //             anchor.onclick = function() {
    //                 alert('ho ho ho');
    //             }
    //         }
    //     }
    // }




})();

</script>