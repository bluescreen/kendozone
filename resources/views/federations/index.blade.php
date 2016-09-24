@extends('layouts.dashboard')
@section('breadcrumbs')
    {!! Breadcrumbs::render('federations.index') !!}

@stop

@section('content')


    <!-- Tabs -->
    <ul class="nav nav-lg nav-tabs nav-tabs-bottom search-results-tabs">
        <li class="active"><a href="#"><i class="position-left"></i> {{trans_choice('core.federation',2)}}</a></li>
        <li><a href="{{ route('associations.index') }}"><i class="position-left"></i> {{trans_choice('core.association',2)}}</a></li>
        <li><a href="{{ route('clubs.index') }}"><i class="position-left"></i> {{trans_choice('core.club',2)}} </a></li>
        <li><a href="{{ route('users.index') }}"><i class="position-left"></i> {{trans_choice('core.user',2)}}</a></li>
    </ul>
    <!-- /tabs -->
    <div class="container-fluid">

        @if (sizeof($federations)==0)
            {{--            @include('layouts.noFederations')--}}
        @else
            <table class="table table-togglable table-hover">
                <thead>
                <tr>

                    <th data-toggle="true">{{ trans_choice('core.name',1) }}</th>
                    <th class="text-center" data-hide="phone">{{ trans('core.federation.president') }}</th>
                    <th class="text-center" data-hide="phone">{{ trans('core.federation.address') }}</th>
                    <th class="text-center" data-hide="phone">{{ trans('core.email') }}</th>
                    <th class="text-center" data-hide="phone">{{ trans('core.federation.phone') }}</th>
                    {{--<th class="text-center" data-hide="all">{{ trans('core.federation.vicepresident') }}</th>--}}
                    {{--<th class="text-center" data-hide="all">{{ trans('core.federation.secretary') }}</th>--}}
                    {{--<th class="text-center" data-hide="all">{{ trans('core.federation.treasurer') }}</th>--}}
                    {{--<th class="text-center" data-hide="all">{{ trans('core.federation.admin') }}</th>--}}
                    <th class="text-center" data-hide="phone">{{ trans('core.country') }}</th>
                    @if (Auth::user()->isSuperAdmin())
                        <th class="text-center" data-hide="phone">{{ trans('core.action') }}</th>
                    @endif
                </tr>
                </thead>
                @foreach($federations as $federation)
                    <tr>
                        <td>

                            @if (Auth::user()->isSuperAdmin())
                                <a href="{!!   URL::action('FederationController@edit',  $federation->id) !!}">{{ $federation->name }}</a>
                            @else
                                {{ $federation->name }}
                            @endif
                        </td>
                        <td align="center">{{ $federation->president->name }}</td>
                        <td align="center">{{ $federation->address }}</td>
                        <td align="center">{{ $federation->email}}</td>
                        <td align="center">{{ $federation->phone }}</td>
                        {{--<td align="center">{{ $federation->vicepresident->name }}</td>--}}
                        {{--<td align="center">{{ $federation->secretary->name }}</td>--}}
                        {{--<td align="center">{{ $federation->treasurer->name }}</td>--}}
                        {{--<td align="center">{{ $federation->admin->name }}</td>--}}
                        <td align="center">@if ($federation->country!= null) <img
                                    src="images/flags/{{ $federation->country->flag }}"/>@else &nbsp; @endif</td>
                        @can('edit', $federation)
                            <td align="center"><a
                                        href="{{URL::action('FederationController@edit', $federation->id)}}"><i
                                            class="icon icon-pencil7"></i></a></td>
                        @endcan
                    </tr>

                @endforeach


            </table>
        @endif


    </div>

    @include("errors.list")
@stop
@section('scripts_footer')
    {!! Html::script('js/pages/header/footable.js') !!}
    <script>
        $(function () {

            // Initialize responsive functionality
            $('.table-togglable').footable();

        });
    </script>

@stop
