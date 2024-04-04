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
                      Users
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                    </li>
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Tampil Users</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->

				<div class="card">
                                    <div class="card-header border-bottom">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route ('users.tambah') }}">
                                         <iconify-icon icon="heroicons:plus"></iconify-icon> Tambah Data
                                        </a>
                                    </div>
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
                                    Email
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Nama
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Level
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Jabatan
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
								@forelse ($user as $tampiluser) 
                                <tr>
                                  <td class="table-td">{{ $loop->iteration }}</td>
                                  <td class="table-td ">{{$tampiluser->email}}</td>
                                  <td class="table-td">
                                    <span class="flex">
                          <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                            <img src="{{ url ('foto/') }}/{{$tampiluser->foto}}" alt="1" class="object-cover w-full h-full rounded-full">
                          </span>
                                    <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$tampiluser->name}}</span>
                                    </span>
                                  </td>
                                  <td class="table-td ">{{$tampiluser->level}}</td>
                                  <td class="table-td ">
                                    <div>
                                      {{$tampiluser->foreign_jabatan->nama_jabatan}}
                                    </div>
                                  </td>
                                  <td class="table-td ">

								  @if ($tampiluser->status_karyawan == 'aktif')
                                    <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                              bg-success-500">
                                      {{$tampiluser->status_karyawan}}
                                    </div>
								  @elseif ($tampiluser->status_karyawan == 'cuti')
                                    <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                              bg-warning-500">
                                      {{$tampiluser->status_karyawan}}
                                    </div>									  
								  @elseif ($tampiluser->status_karyawan == 'tidak aktif')
                                    <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                              bg-danger-500">
                                      {{$tampiluser->status_karyawan}}
                                    </div>									  								  
								  @endif
                                  </td>
                                  <td class="table-td ">
                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                      <a class="action-btn" href="{{ route ('users.edituser', $tampiluser->id) }}" target="_blank">
                                        <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                      </a>
                                      <a class="action-btn" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalhapus{{ $tampiluser->id }}">
                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                      </a>
									<form action="{{ route('users.hapusUser', $tampiluser->id) }}" method="post">
                                                                                                                            @csrf
                                                                                                                            @method('DELETE')
									  <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalhapus{{ $tampiluser->id }}" tabindex="-1" aria-labelledby="dangerModalLabel" aria-hidden="true">
										<div class="modal-dialog relative w-auto pointer-events-none">
										  <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
														rounded-md outline-none text-current">
											<div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
											  <!-- Modal header -->
											  <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-danger-500">
												<h3 class="text-base font-medium text-white dark:text-white capitalize">
												  Hapus Data {{ $tampiluser->name }}?
												</h3>
												<button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
																	dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
												  <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
																			11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
												  </svg>
												  <span class="sr-only">Close modal</span>
												</button>
											  </div>
											  <!-- Modal body -->
											  <div class="p-6 space-y-4">
												<h6 class="text-center"> 
                                                                                                                                                    Apa anda yakin ingin menghapus data ini ?
                                                                                                                                                </h6>
											  </div>
											  <!-- Modal footer -->
											  <div class="flex items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
<button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Tutup</button>
                                                                                                                                                <button type="submit" class="btn btn-danger">Hapus</button>
											  </div>
											</div>
										  </div>
										</div>
									  </div>		 </form> 								  
                                    </div>
                                  </td>
                                </tr>
                                                        @empty  													
                                                        <tr>
                                                        <td colspan="7" class="text-center">Tidak ada data</td>																			
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