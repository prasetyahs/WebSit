<?php
function base_url($a=''){
    $getbase_url=$GLOBALS['setUri']['base'];
    return $getbase_url.$a;
}

function assets($a=''){
    $getbase_assets=$GLOBALS['setUri']['assets'];
    return base_url($getbase_assets.$a);
}

function url($a='',$b='',$c = ''){
  if($c != ''){

    return base_url($b.'?halaman='.$a.'&id='.$c);
  }else{
    return base_url($b.'?halaman='.$a);

  }
}

function templates($a=''){
    return assets($GLOBALS['template'].$a);
}

function content_open($title=''){
	return '
    <!-- Main content -->
    <section class="content">
 
       <!-- Default box -->
       <div class="card">
         <div class="card-header">
           <h3 class="card-title">'.$title.'</h3>
 
           <div class="card-tools">
             
          
           </div>
         </div>
         <div class="card-body">
           
        
        
       
      ';
}
function content_close(){
	return '
    </div>
     
    </div>
    <!-- /.card -->

  </section>';

}
