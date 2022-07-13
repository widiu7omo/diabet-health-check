// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'pola_makan.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

_$_PolaMakan _$$_PolaMakanFromJson(Map<String, dynamic> json) => _$_PolaMakan(
      id: json['id'] as int,
      category: json['category'] as String,
      dilarang: json['dilarang'] as String,
      dianjurkan: json['dianjurkan'] as String,
      pemeriksaan: json['pemeriksaan'] == null
          ? null
          : Pemeriksaan.fromJson(json['pemeriksaan'] as Map<String, dynamic>),
      jadwal: json['jadwal'] == null
          ? null
          : JadwalCheckup.fromJson(json['jadwal'] as Map<String, dynamic>),
    );

Map<String, dynamic> _$$_PolaMakanToJson(_$_PolaMakan instance) =>
    <String, dynamic>{
      'id': instance.id,
      'category': instance.category,
      'dilarang': instance.dilarang,
      'dianjurkan': instance.dianjurkan,
      'pemeriksaan': instance.pemeriksaan,
      'jadwal': instance.jadwal,
    };
