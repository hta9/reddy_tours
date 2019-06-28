
<script type="text/javascript">
$("#myform").submit(function(e) {
    e.preventDefault();
}).validate({
    rules: {...},
    submitHandler: function(form) { 
        alert("Do some stuff...");
        //submit via ajax
        return false;  //This doesn't prevent the form from submitting.
    }
});
</script>