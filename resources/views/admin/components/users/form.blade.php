<div class="col-md-4 col-md-offset-4">

    <form action="{{ (isset($user))? route('users.update', ['id' => $user->id]) : route('users.store') }}" method="post">
        {{ csrf_field() }}
        <h1 class="lead">{{ (isset($user))? 'Edit user' : 'Add user' }}</h1>

        <div class="form-group">

            <input type="text" class="form-control" name="name"  placeholder="Name" value="{{ (isset($user))? $user->name : old('name') }}">

        </div>


        <div class="form-group">

            <input type="text" class="form-control" name="email"  placeholder="Email" value="{{ (isset($user))? $user->email : old('email') }}">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="username"  placeholder="Username" value="{{ (isset($user))? $user->username : old('username') }}">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" name="password"  placeholder="Password" >

        </div>

        <div class="form-group">
            <p><i>Roles:</i></p>
            @foreach($roles as $role)
                <input id="role{{$role->id}}" name="id_role" class="chk-col-deep-purple" value="{{ $role->id }}" type="radio">
                <label for="role{{$role->id}}"> {{ $role->name }} </label>
            @endforeach
        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-warning">{{ (isset($user))? 'Change user' : 'Add user' }}</button>

        </div>

    </form>


</div>