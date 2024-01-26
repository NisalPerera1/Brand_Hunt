@extends('layouts.admin_includes.app')

@section('content')
<header class="card-header noborder">
    <h4 class="card-title">All Sliders</h4>
</header>
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('sliders.create') }}" class="btn btn-success">Create New Slider</a>
</div>
<div class="card-body px-6 pb-6">
    <div class="overflow-x-auto -mx-6">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden">
                <table id="sliderDataTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                    <thead class="bg-slate-200 dark:bg-slate-700">
                        <tr>
                            <th scope="col" class="table-th">ID</th>
                            <th scope="col" class="table-th">Title</th>
                            <th scope="col" class="table-th">Description</th>
                            <th scope="col" class="table-th">Image</th>
                            <th scope="col" class="table-th">Action</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                        @foreach($sliders as $slider)
                            <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                <td class="table-td">{{ $slider->id }}</td>
                                <td class="table-td">{{ $slider->title }}</td>
                                <td class="table-td">{{ $slider->description }}</td>
                                <td class="table-td">
                                    <img src="{{ asset('slider_images/' . $slider->image) }}" alt="Slider Image" style="max-width: 50px; max-height: 50px;">
                                </td>
                                
                                <td class="table-td">
                                    <a class="btn btn-info btn-sm" href="{{ route('sliders.edit', $slider->id) }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this slider?')">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
