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

if(!function_exists('checkDatesValidity')){
    function checkDatesValidity($date_from, $date_to){
        $date_from = date_format(date_create($date_from), 'Y-m-d');
        $date_to = date_format(date_create($date_to), 'Y-m-d');
        $result = "";
        if($date_from > $date_to){
            $result = "Date From could not be greater than Date To";
        }elseif($date_from < date('Y-m-d') || $date_to < date('Y-m-d')){
            $result = "Date From/To could not be in the past";
        }else{
            $result = 1;
        }

        return $result;
    }
}

if(!function_exists('getMonthName')){
    function getMonthName($month_number){
        
    }
}
?>
