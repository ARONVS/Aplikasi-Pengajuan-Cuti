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
                      Cuti
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                    </li>
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Detail Cuti {{ $cuti->foreign_users->name }}</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->
 
                <div class="lg:flex flex-wrap blog-posts lg:space-x-5 space-y-5 lg:space-y-0 rtl:space-x-reverse">
                  <div class="flex-none">
                    <div class="lg:max-w-[360px]">
                      <div class="card">
                        <div class="card-body p-6">

                          <!-- BEGIN: Blog Sidebar -->





                          <div class="space-y-5 divide-y divide-slate-100 dark:divide-slate-700 -mx-6">
                            <div class="pt-4 px-6">
                              <h4 class="text-slate-600 dark:text-slate-300 text-xl font-medium mb-4">
                                Data Diri
                              </h4>
                              <ul class="list-item space-y-6">

                                <li>
                                  <a href="#" class="flex space-x-1 items-start leading-[1] text-sm text-slate-500 dark:text-slate-300 hover:text-slate-900 transition
                                duration-150 rtl:space-x-reverse">
                                    <span class="text-sm">
                                <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
                            </span>
                                    <span>Nama : {{ $cuti->foreign_users->name }}</span>
                                  </a>
                                </li>

                                <li>
                                  <a href="#" class="flex space-x-1 items-start leading-[1] text-sm text-slate-500 dark:text-slate-300 hover:text-slate-900 transition
                                duration-150 rtl:space-x-reverse">
                                    <span class="text-sm">
                                <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
                            </span>
                                    <span>Email : {{ $cuti->foreign_users->email }} </span>
                                  </a>
                                </li>

                                <li>
                                  <a href="#" class="flex space-x-1 items-start leading-[1] text-sm text-slate-500 dark:text-slate-300 hover:text-slate-900 transition
                                duration-150 rtl:space-x-reverse">
                                    <span class="text-sm">
                                <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
                            </span>
                                    <span>Tanggal Lahir : {{ $cuti->foreign_users->tgl_lahir }}</span>
                                  </a>
                                </li>

                                <li>
                                  <a href="#" class="flex space-x-1 items-start leading-[1] text-sm text-slate-500 dark:text-slate-300 hover:text-slate-900 transition
                                duration-150 rtl:space-x-reverse">
                                    <span class="text-sm">
                                <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
                            </span>
                                    <span>Tempat Lahir : {{ $cuti->foreign_users->tempat_lahir }}</span>
                                  </a>
                                </li>

                                <li>
                                  <a href="#" class="flex space-x-1 items-start leading-[1] text-sm text-slate-500 dark:text-slate-300 hover:text-slate-900 transition
                                duration-150 rtl:space-x-reverse">
                                    <span class="text-sm">
                                <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
                            </span>
                                    <span>Gender : {{ $cuti->foreign_users->gender }} </span>
                                  </a>
                                </li>

                                <li>
                                  <a href="#" class="flex space-x-1 items-start leading-[1] text-sm text-slate-500 dark:text-slate-300 hover:text-slate-900 transition
                                duration-150 rtl:space-x-reverse">
                                    <span class="text-sm">
                                <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
                            </span>
                                    <span> Telp : {{ $cuti->foreign_users->telp }} </span>
                                  </a>
                                </li>

                                <li>
                                  <a href="#" class="flex space-x-1 items-start leading-[1] text-sm text-slate-500 dark:text-slate-300 hover:text-slate-900 transition
                                duration-150 rtl:space-x-reverse">
                                    <span class="text-sm">
                                <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
                            </span>
                                    <span>Alamat : {{ $cuti->foreign_users->alamat }}</span>
                                  </a>
                                </li>

                                <li>
                                  <a href="#" class="flex space-x-1 items-start leading-[1] text-sm text-slate-500 dark:text-slate-300 hover:text-slate-900 transition
                                duration-150 rtl:space-x-reverse">
                                    <span class="text-sm">
                                <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
                            </span>
                                    <span>Jabatan : {{ $cuti->foreign_jabatan->nama_jabatan }}</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="flex space-x-1 items-start leading-[1] text-sm text-slate-500 dark:text-slate-300 hover:text-slate-900 transition
                                duration-150 rtl:space-x-reverse">
                                    <span class="text-sm">
                                <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
                            </span>
                                    <span>Status Karyawan : {{ $cuti->foreign_users->status_karyawan }}</span>
                                  </a>
                                </li>

                              </ul>
                            </div>
                            <div class="pt-4 px-6">
                              <h5 class="text-slate-600 dark:text-slate-300 text-xl font-medium mb-4">
                                Status Cuti : {{ $cuti->status }}
                              </h5>
						
										<form action="{{ route('pimpinan.teruskancuti', $cuti->id) }}" method="post">
                                      @csrf		
                                @method('PUT')
										  <button type="submit" class="btn btn-primary">Terima</button>
										</form>
																	

                            </div>
                          </div>
                          <!-- END: Blog Sidebar -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flex-1">
                    <div class="grid grid-cols-1 gap-5">
                      <div class="card p-6">
                        <h5 class="card-title text-slate-900">
                          <a href="#">{{ $cuti->foreign_jeniscuti->jenis_cuti }} ({{ $cuti->mulai_cuti }} - {{ $cuti->akhir_cuti }})</a>
                        </h5>
                        <div class="card-text dark:text-slate-300 mt-4 space-y-4 leading-5 text-slate-600 text-sm border-b border-slate-100
                            dark:border-slate-700 pb-6">
                          <?php 
						  
							echo $cuti->keterangan;
							
						  ?>
                        </div>
                        <div class="mt-6">
						
                        <h5 class="card-title text-slate-900">
                          <a href="#">Feedback Sekretaris </a>
                        </h5>
                        <div class="card-text dark:text-slate-300 mt-4 space-y-4 leading-5 text-slate-600 text-sm border-b border-slate-100
                            dark:border-slate-700 pb-6">
                          <?php 
						  
							echo $feedback->feedback_sekretaris;
							
						  ?>
                        </div>
						<br>
                        <h5 class="card-title text-slate-900">
                          <a href="#">Feedback Pimpinan</a>
                        </h5>
                        <div class="card-text dark:text-slate-300 mt-4 space-y-4 leading-5 text-slate-600 text-sm border-b border-slate-100
                            dark:border-slate-700 pb-6">
                          <?php 
						  
							echo $feedback->feedback_pimpinan;
							
						  ?>
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
      </div>

 @include('layouts.components.footer')