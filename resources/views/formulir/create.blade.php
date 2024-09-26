
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .card-custom {
            padding: 5px;
            margin: 0 auto;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .btn-radio {
            margin: 0 auto;
            display: inline-block;
            padding: 15px 50px;
            cursor: pointer;
            border-radius: 20px;
            border: 1px solid #ccc;
            text-align: center;
        }
        .btn-radio.active {
            background-color: #007bff;
            color: #fff;
        }
        .custom-file-input {
            position: relative;
            cursor: pointer;
        }
        .custom-file-input input {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
        .custom-file-input img {
            max-width: 100px;
        }
        .btn-submit {
            border-radius: 20px;
        }
        .btn-submit:hover {
            background-color: #007bff;
            color: #fff;
        }


    </style>
</head>
<body>
    <div class="container mt-5">
    
        <div class="card card-custom mb-4">
            <div class="card-body text-center">
                <h1 class="card-title">Formulir Absensi</h1>
            </div>
        </div>

        
        <div class="card card-custom p-4">
            <form action="{{ route('formulir.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}">
                    @error('nama')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

               
                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <div class="d-flex gap-2">
                        <div class="btn-radio {{ old('status') == 'izin' ? 'active' : '' }}" onclick="selectRadio('izin')">
                            Izin
                        </div>
                        <div class="btn-radio {{ old('status') == 'sakit' ? 'active' : '' }}" onclick="selectRadio('sakit')">
                            Sakit
                        </div>
                    </div>
                    <input type="hidden" id="status" name="status" value="{{ old('status') }}">
                    @error('status')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                
                <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan:</label>
                    <textarea id="alasan" name="alasan" class="form-control">{{ old('alasan') }}</textarea>
                    @error('alasan')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                
                <div class="mb-3">
                    <label for="bukti">Bukti Foto:</label>
                        <input type="file" id="bukti" name="bukti">
                        @error('bukti')
                            <p>{{ $message }}</p>
                        @enderror
                </div>

               
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function selectRadio(status) {
            document.getElementById('status').value = status;

            let buttons = document.querySelectorAll('.btn-radio');
            buttons.forEach(button => button.classList.remove('active'));

            if (status === 'izin') {
                buttons[0].classList.add('active');
            } else if (status === 'sakit') {
                buttons[1].classList.add('active');
            }
        }
    </script>
</body>
</html>
