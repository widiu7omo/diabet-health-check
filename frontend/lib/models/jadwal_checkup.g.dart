// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'jadwal_checkup.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

_$_JadwalCheckup _$$_JadwalCheckupFromJson(Map<String, dynamic> json) =>
    _$_JadwalCheckup(
      id: json['id'] as int,
      checkup: json['checkup'] as String,
      tglCheckup: json['tgl_checkup'] as String,
      lokasi: json['lokasi'] as String,
      catatan: json['catatan'] as String?,
      status: json['status'] as String,
    );

Map<String, dynamic> _$$_JadwalCheckupToJson(_$_JadwalCheckup instance) =>
    <String, dynamic>{
      'id': instance.id,
      'checkup': instance.checkup,
      'tgl_checkup': instance.tglCheckup,
      'lokasi': instance.lokasi,
      'catatan': instance.catatan,
      'status': instance.status,
    };
