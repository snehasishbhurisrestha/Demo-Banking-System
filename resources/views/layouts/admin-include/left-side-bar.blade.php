<div id="left-sidebar" class="sidebar">
    <h5 class="brand-name">{{ config('app.name', 'Laravel') }}<a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-uni">Admin</a></li>
        {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-admin">Admin</a></li> --}}
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="menu-uni" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    
                    @canany(['Permission Show', 'Role Show'])
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-lock"></i><span>Roles Permissions</span>
                        </a>
                        <ul>
                            @can('Role Show')
                            <li><a href="{{ route('roles') }}">Roles</a></li>
                            @endcan
                            @can('Permission Show')
                            <li><a href="{{ route('permission') }}">Permission</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    {{-- @can('Agents Show')
                    <li><a href="{{ route('agents.index') }}"><i class="fa fa-users"></i><span>Agents</span></a></li>
                    @endcan --}}

                    @can('User Show')
                    <li><a href="{{ route('customers.index') }}"><i class="fa fa-users"></i><span>Users</span></a></li>
                    @endcan

                    @can('User Show')
                    <li><a href="{{ route('deposit.view') }}"><i class="fa fa-users"></i><span>Deposit</span></a></li>
                    @endcan

                    @can('User Show')
                    <li><a href="{{ route('withdraw.view') }}"><i class="fa fa-users"></i><span>Withdraw</span></a></li>
                    @endcan

                </ul>
            </nav>
        </div>
    </div>
</div>