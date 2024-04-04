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
                      Jenis Cuti
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                    </li>
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Edit Data</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->
                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                  <div class="card">
                    <div class="card-body flex flex-col p-6">
                      <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                          <div class="card-title text-slate-900 dark:text-white">Update Data {{ $jenis_cuti->jenis_cuti}}</div>
                        </div>
                      </header>
                      <div class="card-text h-full ">
                        <form class="space-y-4" action="{{ route('jenis_cuti.prosesupdatejenis_cuti', $jenis_cuti->id) }}" method="post">
                                      @csrf		
                                @method('PUT')
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Jenis Cuti</label>
                            <input type="text" class="form-control" required name="jenis_cuti" value="{{ $jenis_cuti->jenis_cuti }}">
                          </div>					  
                          <button type="submit" class="btn inline-flex justify-center btn-dark ml-28">Update</button>
                        </form>
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