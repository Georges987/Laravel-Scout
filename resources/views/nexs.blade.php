<!DOCTYPE html>
<html>

<head>
    <title>Laravel Scout</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Nexus Research with AI</h2><br />
        <form method="POST" action="{{ route('nexus.store') }}" autocomplete="off">
            @if (count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br />
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="Enter the nex name" value="{{ old('name') }}">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <input type="text" id="description" name="description" class="form-control"
                            placeholder="Enter the nex description" value="{{ old('description') }}">
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button class="btn btn-success">Create nexus</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="panel panel-primary">
            <div class="panel-heading">Nexus anagement</div>
            <div class="panel-body">
                <form method="GET" action="{{ route('nexus.index') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="titlesearch" class="form-control"
                                    placeholder="Enter Title For Search" value="{{ old('titlesearch') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th> Description </th>
                        <th>Creation Date</th>
                        <th>Updated Date</th>
                    </thead>
                    <tbody>
                        @if ($items->count())
                            @foreach ($items as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">There are no data.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $items->links() }}
            </div>
        </div>
    </div>
</body>

</html>
