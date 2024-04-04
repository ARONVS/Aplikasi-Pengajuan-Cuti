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
                      Tambah Data</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->
                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                  <div class="card">
                    <div class="card-body flex flex-col p-6">
                      <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                          <div class="card-title text-slate-900 dark:text-white">Tambah Data</div>
                        </div>
                      </header>
                      <div class="card-text h-full ">
                        <form class="space-y-4" action="{{ route('pegawai_jeniscuti.prosesTambah') }}" method="post">
                                        @csrf
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Jabatan</label>
							<select class="form-control" readonly name="id_jabatan">
								<option value="{{ Auth::user()->foreign_jabatan->id }}">{{ Auth::user()->foreign_jabatan->nama_jabatan }}</option>
							</select>
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Jenis Cuti</label>
							<select class="form-control" required name="id_jeniscuti">
											@forelse ($jenis_cuti as $tampildata)
												<option value="{{ $tampildata->id }}">{{ $tampildata->jenis_cuti }}</option>
												@empty
												<option disabled>Tidak ada data</option>
											@endforelse
							</select>
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Mulai Cuti</label>
                            <input type="date" class="form-control" required name="mulai">
                          </div>
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Akhir Cuti</label>
                            <input type="date" class="form-control" required name="akhir_cuti">
                          </div>						  	
                          <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Keterangan</label>
								<textarea id="froala-editor" name="keterangan"> </textarea>
                          </div>							  
                          <button type="submit" class="btn inline-flex justify-center btn-dark ml-28">Submit</button>
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.19/css/froala_editor.min.css" integrity="sha512-frSJfZcjS/cE378Llgugnv4c8y/0a3cS2oVHM08FSEq3dYfJe90KZBI2yEwXDlXnC9My2S2MTEU770dx1lJ9Pw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.19/js/froala_editor.min.js" integrity="sha512-yk3WwS2p/kV3MP4ehzwQZJeoNUJV7wypuelSfIG/C7NqRH8XEVgbroAePhzpd15NGR8YRS+AZMbeShS28e+W3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  new FroalaEditor('textarea#froala-editor', {
	toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'help', 'html', '|', 'undo', 'redo','trackChanges','markdown']
})
</script> 
	  
 @include('layouts.components.footer')