<?php

namespace App;

class ErrorDesc
{
   public static $OK = 'Sukses';
   public static $ERROR_LOGIN 	= 'Gagal Login';
   public static $INVALID_IMEI 	= 'Akses perangkat ditolak';
   public static $ACCESS_DENIED = 'Akses tidak di izinkan';
   public static $EMPTY_DATA 	= 'Tidak ada data';
   public static $INVALID_TOKEN = 'Token tidak sesuai';
   public static $DUPLICATE_ENTRY = 'Duplicate Entry';
   public static $NOT_CHECKIN = 'Anda belum melakukan absensi masuk';
   public static $ALLREADY_CHECKOUT = 'Anda sudah melakukan absensi pulang';
   public static $NOT_DELETE_ORG = 'Organisasi ini tidak dapat dihapus';
}