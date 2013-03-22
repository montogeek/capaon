@layout('templates/admin')

@section('contenido')

        <div class="span9 well">

          <div class="row-fluid">

            <div>

              <h2>Información Institucional</h2>

              <p>Acá puedes editar la información institucional de la empresa.</p>

            </div>

            @if (Session::has('mensaje'))

              {{ Alert::success(Session::get('mensaje')) }}

            @endif

            @foreach ($informacion as $info)

            <div>

            <h4>Misión</h4>

              {{ Form::open('admin/infoempresa/guardartodo'); }}

              {{ Form::textarea('mision',$info->mision,array('id'=>'mision', 'style'=>'width:100%','required'=>'')); }}

              {{ Form::submit('Guardar',array('class'=>'btn btn-primary')); }}

            </div>

            <div>

              <h4>Visión</h4>

              {{ Form::textarea('vision',$info->vision,array('id'=>'vision', 'style'=>'width:100%','required'=>'')); }}

              {{ Form::submit('Guardar',array('class'=>'btn btn-primary')); }}

            </div>

            <div>

              <h4>Quienes Somos</h4>

              {{ Form::textarea('quien',$info->quien,array('id'=>'quienes_somos', 'style'=>'width:100%','required'=>'')); }}

              {{ Form::submit('Guardar',array('class'=>'btn btn-primary')); }}

            </div>

            <div>

              <h4>Correo Electronico</h4>

              {{ Form::text('email',$info->email,array('id'=>'email', 'required'=>'')); }}

              <div>

                {{ Form::submit('Guardar',array('class'=>'btn btn-primary')); }}

              </div>

            </div>
            <br/>
            <br/>
            <div class = 'span12'>

              {{ Form::submit('Guardar Todo',array('class'=>'btn btn-primary'));  }}

              {{ Form::close(); }}

            </div>

            @endforeach

          </div>

        </div><!--/span-->

      </div><!--/row-->

      <hr>

      <footer>

        <p>&copy; CAPAON 2012</p>

      </footer>

    </div><!--/.fluid-container-->

@endsection

@section('info_empresa')

  <script type="text/javascript">

        $('#mision').wysihtml5();

        $('#vision').wysihtml5();

        $('#quienes_somos').wysihtml5();

  </script>

@endsection