</body>
<!-- js cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script>
    function loadFile(event){
        let output = document.getElementById("output");

        // file reader to read the input
        let reader = new FileReader();

        reader.onload = function(){
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
        
    }
</script>

</html>