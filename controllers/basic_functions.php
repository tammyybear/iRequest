<?php
if(!function_exists('redirectPagewithAlert')){
    function redirectPagewithAlert($page, $message){
        ?>
        <script>
            alert("<?php echo $message; ?>");
            self.location.replace("<?php echo $page ?>");
        </script>
        <?php
    }
}

if(!function_exists('redirectPage')){
    function redirectPage($page){
        ?>
        <script>
            self.location.replace("<?php echo $page ?>");
        </script>
        <?php
    }
}
?>
