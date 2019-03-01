@extends('layouts.app')

@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ $title_singular }} Table</h4>
                            <p class="card-category">All the {{ $title_plural }} are shown here.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            Index
                                        </th>

                                        @foreach($columns[0] as $column)

                                            @php
                                                $id_getter = substr($column, -2);
                                                $without_id_object_str = substr($column, 0, -3);

                                            @endphp

                                                @if($id_getter != 'id')
                                                    <th>
                                                       {{ ucwords($column) }}
                                                    </td>
                                                @else
                                                    <th>
                                                        {{ ucwords($without_id_object_str) }}
                                                    </th>
                                                `@endif

                                        @endforeach

                                        </thead>


                                    <tbody>

                                    @php $i=0; $column_index = 0 @endphp

                                    @foreach($entries as $entry)

                                        <tr>
                                            <td>
                                                {{ ++$i }}
                                            </td>

                                            @foreach($columns[1] as $c)
                                                @php
                                                    $id_getter = substr($c, -2);

                                                @endphp
                                                    @if($id_getter != 'id')
                                                        <td>
                                                            {{ $entry[$c] }}
                                                        </td>
                                                    @else
                                                    <td>
                                                        @php
                                                            $without_id_object_str = substr($c, 0, -3);
                                                        @endphp
                                                            {{ $entry[$without_id_object_str]->name }}
                                                    </td>
                                                    @endif
                                            @endforeach
                                        </tr>

                                    @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="https://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="https://creative-tim.com/presentation">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/license">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
            </div>
        </div>
    </footer>


@endsection
