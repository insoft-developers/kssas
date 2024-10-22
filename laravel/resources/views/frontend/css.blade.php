@if($view == 'keanggotaan')
    <style>
        @media print {
            .no-print {
                display:none;
            }
            
            #table-angsuran {
                font-size:12px !important;
            }
            
            .image-display-pinjaman {
                width: 100%;
                margin-top:10px;
                height: 160px;
                border-radius: 6px;
                border: 1.5px solid #868694;
            }  
        }
    </style>
@endif


<style> 
        .bukti-img{
            width: 100px;
            object-fit: cover;
            border: 2px solid yellow;
            border-radius: 4px;
        }

        .keanggotaan-title{
                font-size: 17px;
                white-space: normal;
        }

        .btn-download-anggota-baru {
            right: 22px;
            position: absolute;
            top: 10px;
        }
        
        .btn-upload-anggota-baru {
            right: 307px;
            position: absolute;
            top: 10px;
        }

        .badge-success {
            background: green;
            color: white;
            font-size: 12px;
            padding-left: 5px;
            padding-right: 5px;
            padding-top: 4px;
            padding-bottom: 4px;
            border-radius: 4px;
        }
        
        .badge-danger{
            background: red;
            color: white;
            font-size: 12px;
            padding-left: 5px;
            padding-right: 5px;
            padding-top: 4px;
            padding-bottom: 4px;
            border-radius: 4px;
        }
        
        .btn-custom {
            background: #3fa421;
            color: white;
        }
        
        .text-putih {
            color: white !important;
        }        

        .whatsapp-btn {
            width: 60px;
            height: 60px;
            border-radius: 30px;
            cursor: pointer;
            padding: 3px;
            background: azure;
        }

        .register-login {
            font-size: 15px;
            font-weight: bold;
            color: #3a3a6c;
            text-align: center;
        }
        
        .tombol-daftar {
            background: orange;
            color: white;
            font-size: 12px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 14px;
        }
        
        .image-display-pinjaman {
            width: 100%;
            height: 160px;
            border-radius: 6px;
            border: 1.5px solid #868694;
        }    
        
        .reset-form {
            float: right;
            background: linear-gradient(45deg, #60c94e, #b3c5f3);
            color: white;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 14px;
            padding-top: 3px;
            padding-bottom: 3px;
            cursor: pointer;
            border-radius: 3px;
        }

        .img-tutup {
            width: 30px;
            height: 30px;
            position: absolute;
            top: -12px;
            right: 5px;
            cursor: pointer;
            display:none;
        }
        
        .img-pinjaman {
            border: 2px dashed red;
            cursor: pointer;
            border-radius: 8px;
            width: 210px;
            height: 210px;
        }

        .btn-action {
            width: 76px !important;
            border: 1px solid;
            padding: 3px 5px 3px 5px;
            font-size: 11px;
            border-radius: 22px;
            background: white;
            display: block;
        }
                
        .ctable {
            font-size: 14px;
            font-family: 'Poppins';
            background: linear-gradient(45deg, #c7c8e4, #fbf9f9);
        }
        
        .ctable th, td {
            
        }
        
        
        .cinput{
            padding: 11px !important;
            border: 2px solid #b5b6c1 !important;
            font-size: 15px !important;
        }
        
        .container-nama {
            display:inline-block;
        }
        
        .nama-anggota {
            
        }
        
        .jabatan-anggota {
            
        }
        
        .profile-image {
            width: 88px;
            height: 88px;
            object-fit: cover;
            background: linear-gradient(45deg, #282e4b, #d2dbddf5);
            padding: 2px;
            border-radius: 44px;
        }

        .btn-ganti-gambar {
                background: linear-gradient(45deg, #03a9f4, #30cfb5);
                position: absolute;
                top: 88px;
                width: 123px;
                height: 31px;
                font-size: 12px;
                color: white;    
        }
        
        
        .img-edit:hover {
            transform: scale(1.5);
        }
            
        .img-edit {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 46px;
            left: 83px;
            background: white;
            border: 1px solid orange;
            padding: 3px;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .img-pro {
            width: 25px;
            height: 25px;
            margin-right: 8px;
            background: white;
            border-radius: 13px;
            padding: 3px;
        }
            
        .lupa-text {
            margin-left: 6px;
            color: #232022 !important;
        } 
        .tombol-login:hover {
            background: linear-gradient(45deg, #e97b4d, #6ae421);
        }
        .tombol-login {
            background: linear-gradient(45deg, black, #1012d9);
            width: 122px;
            text-align: center;
            color: white;
            border-radius: 30px;
            padding-top: 5px;
            padding-bottom: 5px;
            cursor: pointer;
        }
        .body-modal {
           background: linear-gradient(45deg, #3fa421, #f3f0fc); 
        }
        .modal-container {
            padding:20px;
        }
        .btn-masuk {
        }
        .label-login {
        }
        .img-login {
            width: 192px;
            height: 72px;
            margin-bottom: 19px;
        }
        .login-control {
            border: 2px solid white;
            padding-top: 12px;
            padding-bottom: 12px;
            border-radius: 30px;
            padding-left: 25px;
            padding-right: 25px;
            background: linear-gradient(45deg, #e7ebf0, transparent);
        }
        #form-register input,select,textarea{
            padding: 11px !important;
            border: 2px solid #b5b6c1 !important;
            font-size: 15px !important;
        }
        #form-register label {
            margin-top: 12px;
            font-size: 13px;
            color: #7e8f97;
        }
        #table-ringkasan th {
            text-align:left;
        }
        #table-alternative .lama {
            text-align: center;
        }
        .overlay {
            background: #1a67f1;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            z-index: 9;
            opacity: 0.2;
        }
        .loading {
            width: 100px;
            height: 100px;
            position: fixed;
            z-index: 99999;
            left: 47%;
            top: 40%;
        }
        .tombol-owl {
            top:30% !important;
        }
        .mt-minus {
            margin-top: -60px;
        }
        .product-text {
            font-size:21px;
        }
        .logo-footer {
            width: 190px;
            margin-top: -13px;
        }
        .product-image {
           transition: transform .2s;
            width: 350px;
            border-radius: 10px;
            margin-bottom: -2px;
            height: 202px !important;
        }
        .product-image:hover{
            transform:scale(1.1);
        }
        .table-profit {
            font-size: 18px;
            font-weight: 400;
        }
        .spasi {
            margin-top:80px;
        }
        
        
        @media (max-width: 991px) {
            .mobile-page {
                margin:20px !important;
            }
            
            .mobile-detail {
                margin-top: -173px;
            }
            
            .akunsaya {
                position: absolute;
                top: 56px;
                z-index: 106;
                width: 176px;
                right: -7px;
            }
            
            .whatsapp-btn {
                width: 60px;
                height: 60px;
                border-radius: 30px;
                cursor: pointer;
                padding: 3px;
                background: azure;
            }
            
            .wa-wrapper {
                right: 15px;
                bottom: 135px;
            }
            
            .btn-download-anggota-baru {
                    left: 0px;
                    position: relative;
                    top: -11px;
                    font-size: 12px;
            }
            .btn-upload-anggota-baru {
                       left: 0px;
                        position: relative;
                        top: -20px;
                        font-size: 12px;
                        width: 207px;
            }
            
        }
        
</style>