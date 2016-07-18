@extends('layouts.menu')

    @section('clases')
     

      {!!Html::style('assets/bootstrap-v3.3.5/css/bootstrap-theme.min.css'); !!}
      {!!Html::style('assets/font-awesome-v4.3.0/css/font-awesome.min.css'); !!}
      
      {!!Html::style('choosen/docsupport/style.css'); !!}

      {!!Html::style('choosen/docsupport/prism.css'); !!}
      {!!Html::style('choosen/chosen.css'); !!}
    
      {!!Html::style('sb-admin/bower_components/metisMenu/dist/metisMenu.min.css'); !!}
      
      {!!Html::style('sb-admin/dist/css/sb-admin-2.css'); !!}
     
      {!!Html::style('sb-admin/bower_components/font-awesome/css/font-awesome.min.css'); !!}
      {!!Html::style('sb-admin/bower_components/datetimepicker/css/bootstrap-datetimepicker.min.css'); !!}
      {!!Html::style('sb-admin/bower_components/fileinput/css/fileinput.css'); !!}


        <style type="text/css" media="all">
          /* fix rtl for demo */
          .chosen-rtl .chosen-drop { left: -9000px; }
        </style>

      {!!Html::script('js/jquery.min.js'); !!}
    
      {!!Html::script('choosen/chosen.jquery.js'); !!}
      {!!Html::script('choosen/docsupport/prism.js'); !!}
      {!!Html::script('sb-admin/bower_components/fileinput/js/fileinput.js'); !!}
      {!!Html::script('sb-admin/bower_components/fileinput/js/fileinput_locale_es.js'); !!}

      <!-- Bootstrap -->
      {!!Html::style('assets/bootstrap-v3.3.5/css/bootstrap.min.css'); !!}
      {!!Html::script('assets/bootstrap-v3.3.5/js/bootstrap.min.js'); !!}

      {!!Html::script('sb-admin/bower_components/datetimepicker/js/moment.js'); !!}
      {!!Html::script('sb-admin/bower_components/datetimepicker/js/bootstrap-datetimepicker.min.js'); !!}
      {!!Html::script('sb-admin/bower_components/ckeditor/ckeditor.js'); !!}
      {!!Html::script('js/general.js'); !!} 
        <script type="text/javascript">
          $(document).ready(function (){
            var config = {
              '.chosen-select'           : {},
              '.chosen-select-deselect'  : {allow_single_deselect:true},
              '.chosen-select-no-single' : {disable_search_threshold:10},
              '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
              '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
              $(selector).chosen(config[selector]);
            }
        });
        </script>    




@stop
