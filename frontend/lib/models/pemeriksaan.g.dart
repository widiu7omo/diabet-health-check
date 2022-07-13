// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'pemeriksaan.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

_$_Pemeriksaan _$$_PemeriksaanFromJson(Map<String, dynamic> json) =>
    _$_Pemeriksaan(
      id: json['id'] as int,
      pemeriksaan: json['pemeriksaan'] as String,
      tglPeriksa: json['tgl_periksa'] as String,
      detailPembahasan: json['detail_pembahasan'] as String?,
      hasilDiagnosa: json['hasil_diagnosa'] as String,
      dokter: json['dokter'] == null
          ? null
          : User.fromJson(json['dokter'] as Map<String, dynamic>),
      pasien: json['pasien'] == null
          ? null
          : User.fromJson(json['pasien'] as Map<String, dynamic>),
    );

Map<String, dynamic> _$$_PemeriksaanToJson(_$_Pemeriksaan instance) =>
    <String, dynamic>{
      'id': instance.id,
      'pemeriksaan': instance.pemeriksaan,
      'tgl_periksa': instance.tglPeriksa,
      'detail_pembahasan': instance.detailPembahasan,
      'hasil_diagnosa': instance.hasilDiagnosa,
      'dokter': instance.dokter,
      'pasien': instance.pasien,
    };
