<form method="POST" action="/upload" enctype="multipart/form-data">
  @csrf
  <input type="file" name="image">
  <input type="text" name="name">
  <button>アップロード</button>
</form>