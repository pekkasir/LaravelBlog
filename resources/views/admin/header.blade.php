<nav class="navbar navbar-default">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ route('admin.index') }}">Dashboard</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="">Posts</a></li>
      <li><a href="{{ route('admin.create') }}">Create Post</a></li>
      <li><a href="">Messages</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="./">Logout<span class="sr-only">(current)</span></a></li>
    </ul>
  </div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav>