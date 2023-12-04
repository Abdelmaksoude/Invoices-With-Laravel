@extends('layouts.master')
@section('css')
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('title')
تفاصيل الفاتوره
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Tabs</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
        @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
                <!-- row opened -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card" id="basic-alert">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Basic Style Tabs</h6>
									<p class="text-muted card-sub-title">It is Very Easy to Customize and it uses in your website apllication.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-1">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">جدول الفواتير</a></li>
														<li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">جدول التفاصيل</a></li>
														<li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">جدول المرفقات</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab1">
                                                        <table class="table text-md-nowrap" id="example1">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-15p border-bottom-0">#</th>
                                                                    <th class="wd-15p border-bottom-0">رقم الفاتوره</th>
                                                                    <th class="wd-15p border-bottom-0">تاريخ الفاتوره</th>
                                                                    <th class="wd-20p border-bottom-0">تاريخ الاستحقاق</th>
                                                                    <th class="wd-15p border-bottom-0">المنتج</th>
                                                                    <th class="wd-10p border-bottom-0">القسم</th>
                                                                    <th class="wd-25p border-bottom-0">الخصم</th>
                                                                    <th class="wd-25p border-bottom-0">نسبة الضريبه</th>
                                                                    <th class="wd-25p border-bottom-0">قيمة الضريبه</th>
                                                                    <th class="wd-25p border-bottom-0">الاجمالى</th>
                                                                    <th class="wd-25p border-bottom-0">الحاله</th>
                                                                    <th class="wd-25p border-bottom-0">ملاحظات</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <tr>
                                                                        <td>{{ $invoices->id }}</td>
                                                                        <td>{{ $invoices->invoice_number }}</td>
                                                                        <td>{{ $invoices->invoice_Date }}</td>
                                                                        <td>{{ $invoices->Due_date }}</td>
                                                                        <td>{{ $invoices->product }}</td>
                                                                        <td><a href="{{ url('InvoicesDetails') }}/{{ $invoices->id }}">{{ $invoices->sections->section_name }}</a></td>
                                                                        <td>{{ $invoices->Discount }}</td>
                                                                        <td>{{ $invoices->Rate_VAT }}</td>
                                                                        <td>{{ $invoices->Value_VAT }}</td>
                                                                        <td>{{ $invoices->Total }}</td>
                                                                        <td>
                                                                            @if ($invoices->Value_Status == 1)
                                                                                <span class="text-success">{{ $invoices->Status }}</span>
                                                                            @elseif($invoices->Value_Status == 2)
                                                                                <span class="text-danger">{{ $invoices->Status }}</span>
                                                                            @else
                                                                                <span class="text-warning">{{ $invoices->Status }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $invoices->note }}</td>
                                                                    </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
													<div class="tab-pane" id="tab2">
                                                        <table class="table text-md-nowrap" id="example1">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-15p border-bottom-0">#</th>
                                                                    <th class="wd-15p border-bottom-0">رقم الفاتوره</th>
                                                                    <th class="wd-15p border-bottom-0">المنتج</th>
                                                                    <th class="wd-25p border-bottom-0">الحاله</th>
                                                                    <th class="wd-25p border-bottom-0">الناشر</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($details as $details)
                                                                    <tr>
                                                                        <td>{{ $details->id }}</td>
                                                                        <td>{{ $details->invoice_number }}</td>
                                                                        <td>{{ $details->product }}</td>
                                                                        <td>
                                                                            @if ($details->Value_Status == 1)
                                                                                <span class="text-success">{{ $details->Status }}</span>
                                                                            @elseif($invoices->Value_Status == 2)
                                                                                <span class="text-danger">{{ $details->Status }}</span>
                                                                            @else
                                                                                <span class="text-warning">{{ $details->Status }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $details->user }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane" id="tab3">
                                                        <div class="card-body">
                                                            <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                            <h5 class="card-title">اضافة مرفقات</h5>
                                                            @can('اضافة مرفق')
                                                                <form method="post" action="{{ url('/InvoiceAttachments') }}"
                                                                enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="customFile"
                                                                            name="file_name" required>
                                                                        <input type="hidden" id="customFile" name="invoice_number"
                                                                            value="{{ $invoices->invoice_number }}">
                                                                            <input type="hidden" id="invoice_id" name="invoice_id"
                                                                            value="{{ $invoices->id }}">
                                                                            <label class="custom-file-label" for="customFile">حدد
                                                                                المرفق</label>
                                                                            </div><br><br>
                                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                            name="uploadedFile">تاكيد</button>
                                                                        </form>
                                                            @endcan
                                                        </div>

                                                        <table class="table text-md-nowrap" id="example1">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-15p border-bottom-0">رقم الفاتوره</th>
                                                                <th class="wd-15p border-bottom-0">اسم الملف</th>
                                                                <th class="wd-25p border-bottom-0">الاضافه بواسطة</th>
                                                                <th class="wd-25p border-bottom-0">تاريخ الاضافه</th>
                                                                <th class="wd-25p border-bottom-0">العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($attachment as $attachment)
                                                                <tr>
                                                                    <td>{{ $attachment->invoice_number }}</td>
                                                                    <td>{{ $attachment->file_name }}</td>
                                                                    <td>{{ $attachment->Created_by }}</td>
                                                                    <td>{{ $attachment->created_at }}</td>
                                                                    <td>
                                                                    <a class="btn btn-outline-success btn-sm"
                                                                        href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                        role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                        عرض</a>

                                                                    <a class="btn btn-outline-info btn-sm"
                                                                    href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                    role="button"><i
                                                                        class="fas fa-download"></i>&nbsp;
                                                                    تحميل</a>

                                                                    @can('حذف المرفق')
                                                                        <button class="btn btn-outline-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-file_name="{{ $attachment->file_name }}"
                                                                        data-invoice_number="{{ $attachment->invoice_number }}"
                                                                        data-id_file="{{ $attachment->id }}"
                                                                        data-target="#delete_file">حذف</button>
                                                                    @endcan
                                                                </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    </div>
												</div>
											</div>
                                                <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('delete_file') }}" method="post">

                {{ csrf_field() }}
                <div class="modal-body">
                    <p class="text-center">
                    <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                    </p>

                    <input type="hidden" name="id_file" id="id_file" value="">
                    <input type="hidden" name="file_name" id="file_name" value="">
                    <input type="hidden" name="invoice_number" id="invoice_number" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>
										</div>
									</div>
<!-- Prism Code -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Internal Input tags js-->
<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
<!--- Tabs JS-->
<script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{URL::asset('assets/js/tabs.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>

<script>
    $('#delete_file').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id_file = button.data('id_file')
        var file_name = button.data('file_name')
        var invoice_number = button.data('invoice_number')
        var modal = $(this)

        modal.find('.modal-body #id_file').val(id_file);
        modal.find('.modal-body #file_name').val(file_name);
        modal.find('.modal-body #invoice_number').val(invoice_number);
    })

</script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
@endsection
