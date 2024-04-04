@include('layouts.components.header')
        <!-- END: Header -->
        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
              <div id="content_layout">




                <!-- BEGIN: Breadcrumb -->
                <div class="mb-5">
                  <ul class="m-0 p-0 list-none">
                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                      <a href="index.html">
                        <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                        <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                      </a>
                    </li>
                    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                      Jabatan
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                    </li>
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Tampil Jabatan</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->

				<div class="card">
                    <div class="card-body px-6 pb-6">
                      <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                          <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                              <thead class=" bg-slate-200 dark:bg-slate-700">
                                <tr>

                                  <th scope="col" class=" table-th ">
                                    No
                                  </th>

                                  <th scope="col" class=" table-th ">
                                   Jenis Cuti
                                  </th>

                                  <th scope="col" class=" table-th ">
                                     Mulai Cuti
                                  </th>

                                  <th scope="col" class=" table-th ">
                                     Akhir Cuti
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Status
                                  </th>
								  
								  
                                  <th scope="col" class=" table-th ">
                                    Action
                                  </th>

                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
								@forelse ($cuti as $tampildata) 
                                <tr>
                                  <td class="table-td">{{ $loop->iteration }}</td>
                                  <td class="table-td ">{{$tampildata->foreign_jeniscuti->jenis_cuti}}</td>
                                  <td class="table-td ">{{$tampildata->mulai_cuti}}</td>
                                  <td class="table-td ">{{$tampildata->akhir_cuti}}</td>
                                  <td class="table-td ">
										  @if ($tampildata->status == 'diajukan')
											<div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-info-500
									  bg-success-500">
											  {{$tampildata->status}}
											</div>
										  @elseif ($tampildata->status == 'diajukan ke pimpinan')
											<div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-primary-500
									  bg-success-500">
											  {{$tampildata->status}}
											</div>											
										  @elseif ($tampildata->status == 'ditolak')
											<div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
									  bg-warning-500">
											  {{$tampildata->status}}
											</div>									  
										  @elseif ($tampildata->status == 'diterima')
											<div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
									  bg-danger-500">
											  {{$tampildata->status}}
											</div>									  								  
										  @endif								  
								  </td>
                                  <td class="table-td ">
                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                      <a class="action-btn" href="{{ route ('sekretaris_cuti.detail', $tampildata->id) }}" target="_blank">
                                        <iconify-icon icon="heroicons:eye"></iconify-icon>
                                      </a>									  
                                    </div>
                                  </td>
                                </tr>
                                                        @empty  													
                                                        <tr>
                                                        <td colspan="6" class="text-center">Tidak ada data</td>																			
                                                        </tr>                                                
                                                        @endforelse  
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                				

              </div>
            </div>
          </div>
        </div>
      </div>

 @include('layouts.components.footer')