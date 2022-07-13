// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'pola_obat.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

_$_PolaObat _$$_PolaObatFromJson(Map<String, dynamic> json) => _$_PolaObat(
      id: json['id'] as int,
      obat: json['obat'] as String,
      jumlah: json['jumlah'] as int,
      anjuran: json['anjuran'] as String,
    );

Map<String, dynamic> _$$_PolaObatToJson(_$_PolaObat instance) =>
    <String, dynamic>{
      'id': instance.id,
      'obat': instance.obat,
      'jumlah': instance.jumlah,
      'anjuran': instance.anjuran,
    };
