@extends('admin.layouts.partials.CSSKid')
@section('title')
Chi Tiết Nhân Viên
@endsection
@section('content')
@foreach($user as  $user)
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('manager.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->nv_hoTen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->nv_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tài Khoản đăng nhập
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>

                                <span class="label label-info">{{ $user->q_ten }}</span>

                        </td>
                    </tr>
                    <tr>
                        <th>
                           Trạng Thái
                        </th>
                        <td>

                            <span class="label label-info">
                                @if( $user->nv_trangThai ==1) Khóa
                                @else Khả Dụng
                                @endif
                            </span>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('manager.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
