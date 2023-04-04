<div class="container-fluid">
  <div class="header py-3 d-flex justify-content-between">
        <h2>Users</h2>
        <span>Home/Users</span>
    </div>
  <div class="table-responsive">
  <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
          <tr>
          <td>{{ $user->id }}</td>
          <td scope="row">{{ $user->name }}</td>
          <td>{{ $user->email  }}</td>
          </td>
        </tr>
        @empty
        @endforelse
        
      </tbody>
  </table>
  </div>

 </div>