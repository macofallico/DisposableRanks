@extends('admin.app')
@section('title', 'Disposable Ranks and Awards Module')

@section('content')
  <div class="card border-blue-bottom">
    <div class="content">
      <p>This module is designed to provide views for your Ranks and Awards with basic language support.</p>
      <hr>
      <p><b>Optional Theming</b></p>
      <p>
        Views/Blades are visually compatible with my themes (Bootstrap 4.6 & FontAwesome) by default, but if you wish you can copy the blade files to your own theme folder and make visual changes there.
        To do this please create a folder inside your theme folder called <b>modules</b> and another one under it called <b>DisposableRanks</b> (case sensitive) then copy blade files 
        you want to edit from <b>phpvms root: modules/DisposableRanks/Resources/views/</b> to this new folder.<br>
        Final path will like <b>phpvms root: resources/views/layouts/Your Theme Folder/modules/DisposableRanks/name_of_the_file_you_coppied.blade.php</b>
      </p>
      <p>&bull; You can repeat this step for every theme you have if you want customized blades for each of them.</p>
      <hr>
      <p>By <a href="https://github.com/FatihKoz" target="_blank">B.Fatih KOZ</a> &copy; @php echo date('Y'); @endphp</p>
    </div>
  </div>
@endsection
