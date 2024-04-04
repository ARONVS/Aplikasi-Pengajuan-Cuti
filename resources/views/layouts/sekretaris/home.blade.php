@include('layouts.components.header')
        <!-- END: Header -->
        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
              <div id="content_layout">


                <div class="space-y-5 profile-page">
                  <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0
                space-y-6 justify-between items-end relative z-[1]">
                    <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>
                    <div class="profile-box flex-none md:text-start text-center">
                      <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                        <div class="flex-none">
                          <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4
                                ring-slate-100 relative">
                            <img src="{{ url ('foto/') }}/{{ Auth::user()->foto }}" alt="" class="w-full h-full object-cover rounded-full">      
                          </div>
                        </div>
                        <div class="flex-1">
                          <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                           {{ Auth::user()->name }}
                          </div>
                          <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                            {{ Auth::user()->level }} / {{ Auth::user()->foreign_jabatan->nama_jabatan }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end profile box -->
                    <div class="profile-info-500 md:flex md:text-start text-center flex-1 max-w-[516px] md:space-y-0 space-y-4">
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          {{ Auth::user()->created_at }}
                        </div>
                        <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                          Tanggal User Dibuat
                        </div>
                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          {{ Auth::user()->email }}
                        </div>
                        <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                         Email
                        </div>
                      </div>
                      <!-- end single -->
                    </div>
                    <!-- profile info-500 -->
                  </div>
                  </div>
                </div>

				<br>
				
                  <div class="grid grid-cols-12 gap-5 mb-5">
                    <div class="2xl:col-span-3 lg:col-span-4 col-span-12">
                      <div class="bg-no-repeat bg-cover bg-center p-5 rounded-[6px] relative" style="background-image: url({{url('assets/images/all-img/widget-bg-2.png')}})">
                        <div class="max-w-[180px]">
                          <h4 class="text-xl font-medium text-white mb-2">
                            <span class="block font-normal">Welcome</span>
                            <span class="block">{{ Auth::user()->name }}</span>
                          </h4>
                          <p class="text-sm text-white font-normal">
                            Welcome to Dashboard
                          </p>
                        </div>
                      </div>
					  
                    </div>
                    <div class="2xl:col-span-9 lg:col-span-8 col-span-12">
                      <div class="grid md:grid-cols-3 grid-cols-1 gap-4">

                        <!-- BEGIN: Group Chart -->


                        <div class="card">
                          <div class="card-body pt-4 pb-3 px-4">
                            <div class="flex space-x-3 rtl:space-x-reverse">
                              <div class="flex-none">
                                <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#E5F9FF] dark:bg-slate-900	 text-info-500">
                                  <iconify-icon icon=heroicons:identification></iconify-icon>
                                </div>
                              </div>
                              <div class="flex-1">
                                <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                  Total <br> Cuti yang Diajukan
                                </div>
                                <div class="text-slate-900 dark:text-white text-lg font-medium">
                                  {{ $totalcuti }}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body pt-4 pb-3 px-4">
                            <div class="flex space-x-3 rtl:space-x-reverse">
                              <div class="flex-none">
                                <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#FFEDE6] dark:bg-slate-900	 text-warning-500">
                                  <iconify-icon icon=heroicons:identification></iconify-icon>
                                </div>
                              </div>
                              <div class="flex-1">
                                <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                  Total Cuti <br> yang Ditolak
                                </div>
                                <div class="text-slate-900 dark:text-white text-lg font-medium">
								{{ $cutiditolak }}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body pt-4 pb-3 px-4">
                            <div class="flex space-x-3 rtl:space-x-reverse">
                              <div class="flex-none">
                                <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#EAE6FF] dark:bg-slate-900	 text-[#5743BE]">
                                  <iconify-icon icon=heroicons:identification></iconify-icon>
                                </div>
                              </div>
                              <div class="flex-1">
                                <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                  Total Cuti <br> yang Diterima
                                </div>
                                <div class="text-slate-900 dark:text-white text-lg font-medium">
								{{ $cutiselesai }}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- END: Group Chart -->
                      </div>
                    </div>
                  </div>

                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                  <div class="card">
                    <div class="card-body flex flex-col p-6">
                      <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                          <div class="card-title text-slate-900 dark:text-white">Data Diri Jika terdapat kesalahan dalam data diri silahkan hubungi admin</div>
                        </div>
                      </header>
                      <div class="card-text h-full ">
                        <form class="space-y-4" action="{{ route('sekretaris.updateprofil', Auth::user()->id) }}">
                           @csrf		
														@method('PUT')	
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Nama</label>
                                            <input id="name" readonly type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" readonly name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Password</label>
                                   <input type="password" class="form-control" id="password" required placeholder="Jika tidak ingin mengganti password maka tidak perlu mengisi form ini"> 
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Tempat Lahir</label>
                            <input type="text" class="form-control" required readonly value="{{ Auth::user()->tempat_lahir }}" name="tempat_lahir">
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Tanggal Lahir</label>
                            <input type="date" class="form-control" required readonly value="tgl_lahir" name="tgl_lahir">
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Gender</label>
							<select class="form-control" required readonly name="gender">
								<option>{{ Auth::user()->gender }}</option>
								<option>Laki-Laki</option>
								<option>Perempuan</option>
							</select>
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">No Telepon</label>
                            <input type="text" class="form-control" readonly value="{{ Auth::user()->telp }}" required name="telp">
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Alamat</label>
                            <input type="text" class="form-control" readonly value="{{ Auth::user()->alamat }}" required name="alamat">
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Jabatan</label>
							<select class="form-control" required name="jabatan" readonly>
								<option>{{ Auth::user()->foreign_jabatan->nama_jabatan }}</option>
							</select>
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Status</label>
							<select class="form-control" required name="status_karyawan" readonly>
								<option>{{ Auth::user()->status_karyawan }}</option>
								<option>tidak aktif</option>
								<option>cuti</option>
							</select>
                          </div>							  
                          <button type="submit" class="btn inline-flex justify-center btn-dark ml-28">Ubah Password</button>
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