@layout('templates/admin')
@section('contenido')
        <div class="span9 well">
	        <div class="row-fluid">
	            <h2>Crear Curso</h2>
	        </div>
          {{ Form::open('admin/curso/nuevo') }}

          {{ $errors->first('nombre', Alert::error(":message")) }}
          {{ Form::label('nombre','Nombre') }} 
          {{ Form::text('nombre',Input::old('nombre', ''),array('required'=>'')) }}

          {{ $errors->first('resumen', Alert::error(":message")) }}
          {{ Form::label('resumen','Resumen') }}
          {{ Form::textarea('resumen',Input::old('resumen', ''),array('style'=>'width:100%','required'=>'')) }}

          {{ $errors->first('objetivo', Alert::error(":message")) }}
          {{ Form::label('objetivo','Objetivo') }}
          {{ Form::textarea('objetivo',Input::old('objetivo', ''),array('style'=>'width:100%','required'=>'')) }}

          {{ $errors->first('justificacion', Alert::error(":message")) }}
          {{ Form::label('justificacion','Justificación') }}
          {{ Form::textarea('justificacion',Input::old('justificacion', ''),array('style'=>'width:100%','required'=>'')) }}

          {{ $errors->first('contenido', Alert::error(":message")) }}
          {{ Form::label('contenido','Contenido') }}
          {{ Form::textarea('contenido',Input::old('contenido', ''),array('style'=>'width:100%','required'=>'')) }}

          {{ $errors->first('ambito', Alert::error(":message")) }}
          {{ Form::label('ambito','Ambito') }}
          {{ Form::text('ambito',Input::old('ambito', ''),array('required'=>'')) }}

          {{ $errors->first('inicio_ins', Alert::error(":message")) }}
          {{ Form::label('inicio_ins','Fecha inicio inscripcion al curso') }}
          {{ Form::text('inicio_ins',Input::old('inicio_ins', ''),array('required'=>'')) }}

          {{ $errors->first('fin_ins', Alert::error(":message")) }}
          {{ Form::label('fin_ins','Fecha Fin inscripcion al curso') }}
          {{ Form::text('fin_ins',Input::old('fin_ins', ''),array('required'=>'')) }}

          {{ $errors->first('inicio_curso', Alert::error(":message")) }}
          {{ Form::label('inicio_curso','Fecha Inicio Curso') }}
          {{ Form::text('inicio_curso',Input::old('inicio_curso', ''),array('required'=>'')) }}

          {{ $errors->first('fin_curso', Alert::error(":message")) }}
          {{ Form::label('fin_curso','Fecha Fin curso') }}
          {{ Form::text('fin_curso',Input::old('fin_curso', ''),array('required'=>'')) }}

          {{-- $errors->first('cupo', Alert::error(":message")) }}
          {{-- Form::label('cupo','Cupo') }}
          {{-- Form::text('cupo',Input::old('cupo', ''),array('required'=>'')) }}

          {{ $errors->first('costo', Alert::error(":message")) }}
          {{ Form::label('costo','Costo') }}
          {{ Form::text('costo',Input::old('costo', ''),array('required'=>'')) }}

          <p>Conferencistas</p>
          <table class="table" id="conferencista" width="100%" title="Conferencistas">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Titulo</th>
                    <th style="width: 36px;"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($conferencistas as $conferencista)
                  <tr>
                    <td>{{ $conferencista->nombre }}</td>
                    <td>{{ $conferencista->apellido }}</td>
                    <td>{{ $conferencista->titulo }}</td>
                    {{ $errors->first('conferencistas'.$conferencista->id, Alert::error(":message")) }}
                    <td>{{ Form::checkbox('conferencista'.$conferencista->id, $conferencista->id, false)}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

          {{ Form::hidden('estado','1')}}
          {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
          {{ Form::close() }}

        </div><!--/span-->
        <div class="span3">
        </div><!--/span-->
      </div><!--/row-->
      <hr>
      <footer>
        <p>&copy; CAPAON 2012</p>
      </footer>
    </div><!--/.fluid-container-->
@endsection
@section('crear_curso')
<script type="text/javascript">
        $('#resumen').wysihtml5();
        $('#objetivo').wysihtml5();
        $('#justificacion').wysihtml5();
        $('#contenido').wysihtml5();
        
         
        $('#inicio_ins').datepicker({
          dateFormat:"yy-mm-dd",
          beforeShow: function customRange(){
            if($('#fin_curso').datepicker('getDate') != null){
              if($('#inicio_curso').datepicker('getDate') != null){
                if($('#fin_ins').datepicker('getDate') != null){
                  return{
                    minDate: 0,
                    maxDate: $('#fin_ins').datepicker('getDate')
                  };
                }
                return{
                  minDate: 0,
                   maxDate: $('#inicio_curso').datepicker('getDate')
                };
              }
              return{
                minDate: 0,
                maxDate: $('#fin_curso').datepicker('getDate')
              };
            }
            if($('#inicio_curso').datepicker('getDate') != null){
              if($('#fin_ins').datepicker('getDate') != null){
                return{
                  minDate: 0,
                  maxDate: $('#fin_ins').datepicker('getDate')
                };
              }
              return{
                minDate: 0,
                maxDate: $('#inicio_curso').datepicker('getDate')
              };
            }
            if($('#fin_ins').datepicker('getDate') != null){
              return{
                minDate: 0,
                maxDate: $('#fin_ins').datepicker('getDate')
              };
            }
            return{
              minDate: 0,
              maxDate: null
            };
          }
        });


        $('#fin_ins').datepicker({
          dateFormat:"yy-mm-dd",
          beforeShow: function customRange(){

            var date = $('#inicio_curso').datepicker('getDate');
            var date6p;

            if($('#inicio_curso').datepicker('getDate') != null){
              var day = date.getDate();
              var month = date.getMonth();
              var year = date.getFullYear();
              date6p = new Date(year, month, day-7);
            }    

            if($('#inicio_ins').datepicker('getDate') != null){
              if($('#fin_curso').datepicker('getDate') != null){
                if($('#inicio_curso').datepicker('getDate') != null){
                  return{
                    minDate: $('#inicio_ins').datepicker('getDate'),
                    maxDate: date6p
                  };
                }
                return{
                  minDate: $('#inicio_ins').datepicker('getDate'),
                  maxDate: $('#fin_curso').datepicker('getDate')
                };
              }  
              if($('#inicio_curso').datepicker('getDate') != null){
                return{
                  minDate: $('#inicio_ins').datepicker('getDate'),
                  maxDate: date6p
                };
              }
              return{
                minDate: $('#inicio_ins').datepicker('getDate'),
                maxDate: null
              };  
            }
            if($('#fin_curso').datepicker('getDate') != null){
              if($('#inicio_curso').datepicker('getDate') != null){
                return{
                  minDate: 0,
                  maxDate: date6p
                };
              }
              return{
                minDate: 0,
                maxDate: $('#fin_curso').datepicker('getDate')
              };
            }  
            if($('#inicio_curso').datepicker('getDate') != null){
              return{
                minDate: 0,
                maxDate: date6p
              };
            }
            return{
              minDate: 0,
              maxDate: null
            };
          }
        });


        $('#inicio_curso').datepicker({
          dateFormat:"yy-mm-dd",
          beforeShow: function customRange(){

            var date = $('#fin_ins').datepicker('getDate');
            var date6p;
            if($('#fin_ins').datepicker('getDate') != null){
              var day = date.getDate();
              var month = date.getMonth();
              var year = date.getFullYear();
              date6p = new Date(year, month, day+7);
            }            
            

            if($('#fin_curso').datepicker('getDate') != null){
              if($('#inicio_ins').datepicker('getDate') != null){
                if($('#fin_ins').datepicker('getDate') != null){ 
                  return{
                    minDate:date6p,
                    maxDate:$('#fin_curso').datepicker('getDate')
                  };
                }
                return{
                  minDate:$('#inicio_ins').datepicker('getDate'),
                  maxDate:$('#fin_curso').datepicker('getDate')
                };
              }
              if($('#fin_ins').datepicker('getDate') != null){
                return{
                  minDate:date6p,
                  maxDate:$('#fin_curso').datepicker('getDate')
                };
              }
              return{
                minDate:0,
                maxDate:$('#fin_curso').datepicker('getDate')
              };
            }
            if($('#inicio_ins').datepicker('getDate') != null){
              if($('#fin_ins').datepicker('getDate') != null){
                return{
                  minDate:date6p,
                  maxDate:null
                };
              }
              return{
                minDate:$('#inicio_ins').datepicker('getDate'),
                maxDate:null
              };
            }
            if($('#fin_ins').datepicker('getDate') != null){ 
              return{
                minDate:date6p,
                maxDate:null
              };
            }
            return{
              minDate:7,
              maxDate:null
            };
          }


        });

        $('#fin_curso').datepicker({
          dateFormat:"yy-mm-dd",
          beforeShow: function customRange(){
            if($('#inicio_ins').datepicker('getDate') != null){
              if($('#fin_ins').datepicker('getDate') != null){
                if($('#inicio_curso').datepicker('getDate') != null){
                  return{
                    minDate: $('#inicio_curso').datepicker('getDate'),
                    maxDate: null
                  };
                }
                return{
                  minDate: $('#fin_ins').datepicker('getDate'),
                  maxDate: null
                };
              }
              return{
                minDate: $('#inicio_ins').datepicker('getDate'),
                maxDate: null
              };
            }
            if($('#fin_ins').datepicker('getDate') != null){
              if($('#inicio_curso').datepicker('getDate') != null){
                return{
                  minDate: $('#inicio_curso').datepicker('getDate'),
                  maxDate: null
                };
              }
              return{
                minDate: $('#fin_ins').datepicker('getDate'),
                maxDate: null
              };
            }
            if($('#inicio_curso').datepicker('getDate') != null){
              return{
                minDate: $('#inicio_curso').datepicker('getDate'),
                maxDate: null
              };
            }
            return{
              minDate: 7,
              maxDate: null
            };
          }
        });
    </script>
@endsection