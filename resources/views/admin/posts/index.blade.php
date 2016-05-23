@extends('admin')

@section('content')


    <div class="row-fluid">
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Posts</div>
                    <div class="pull-right"><span class="badge badge-info">{{count($posts)}}</span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Ação</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{ $post->title }}</td>
                            <td><a href='{{ asset("/admin/posts/edit/$post->id")}}'>Editar</a> | <a href='{{ asset("admin/posts/destroy/$post->id")}}'>Apagar</a> </td>

                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="pagination">
                        {!! $posts->render() !!}
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Orders</div>
                    <div class="pull-right"><span class="badge badge-info">752</span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Coat</td>
                            <td>02/02/2013</td>
                            <td>$25.12</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacket</td>
                            <td>01/02/2013</td>
                            <td>$335.00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Shoes</td>
                            <td>01/02/2013</td>
                            <td>$29.99</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>


@endsection