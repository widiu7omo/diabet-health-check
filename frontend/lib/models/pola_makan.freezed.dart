// coverage:ignore-file
// GENERATED CODE - DO NOT MODIFY BY HAND
// ignore_for_file: type=lint
// ignore_for_file: unused_element, deprecated_member_use, deprecated_member_use_from_same_package, use_function_type_syntax_for_parameters, unnecessary_const, avoid_init_to_null, invalid_override_different_default_values_named, prefer_expression_function_bodies, annotate_overrides, invalid_annotation_target

part of 'pola_makan.dart';

// **************************************************************************
// FreezedGenerator
// **************************************************************************

T _$identity<T>(T value) => value;

final _privateConstructorUsedError = UnsupportedError(
    'It seems like you constructed your class using `MyClass._()`. This constructor is only meant to be used by freezed and you are not supposed to need it nor use it.\nPlease check the documentation here for more information: https://github.com/rrousselGit/freezed#custom-getters-and-methods');

PolaMakan _$PolaMakanFromJson(Map<String, dynamic> json) {
  return _PolaMakan.fromJson(json);
}

/// @nodoc
mixin _$PolaMakan {
  int get id => throw _privateConstructorUsedError;
  String get category => throw _privateConstructorUsedError;
  String get dilarang => throw _privateConstructorUsedError;
  String get dianjurkan => throw _privateConstructorUsedError;

  Map<String, dynamic> toJson() => throw _privateConstructorUsedError;
  @JsonKey(ignore: true)
  $PolaMakanCopyWith<PolaMakan> get copyWith =>
      throw _privateConstructorUsedError;
}

/// @nodoc
abstract class $PolaMakanCopyWith<$Res> {
  factory $PolaMakanCopyWith(PolaMakan value, $Res Function(PolaMakan) then) =
      _$PolaMakanCopyWithImpl<$Res>;
  $Res call({int id, String category, String dilarang, String dianjurkan});
}

/// @nodoc
class _$PolaMakanCopyWithImpl<$Res> implements $PolaMakanCopyWith<$Res> {
  _$PolaMakanCopyWithImpl(this._value, this._then);

  final PolaMakan _value;
  // ignore: unused_field
  final $Res Function(PolaMakan) _then;

  @override
  $Res call({
    Object? id = freezed,
    Object? category = freezed,
    Object? dilarang = freezed,
    Object? dianjurkan = freezed,
  }) {
    return _then(_value.copyWith(
      id: id == freezed
          ? _value.id
          : id // ignore: cast_nullable_to_non_nullable
              as int,
      category: category == freezed
          ? _value.category
          : category // ignore: cast_nullable_to_non_nullable
              as String,
      dilarang: dilarang == freezed
          ? _value.dilarang
          : dilarang // ignore: cast_nullable_to_non_nullable
              as String,
      dianjurkan: dianjurkan == freezed
          ? _value.dianjurkan
          : dianjurkan // ignore: cast_nullable_to_non_nullable
              as String,
    ));
  }
}

/// @nodoc
abstract class _$$_PolaMakanCopyWith<$Res> implements $PolaMakanCopyWith<$Res> {
  factory _$$_PolaMakanCopyWith(
          _$_PolaMakan value, $Res Function(_$_PolaMakan) then) =
      __$$_PolaMakanCopyWithImpl<$Res>;
  @override
  $Res call({int id, String category, String dilarang, String dianjurkan});
}

/// @nodoc
class __$$_PolaMakanCopyWithImpl<$Res> extends _$PolaMakanCopyWithImpl<$Res>
    implements _$$_PolaMakanCopyWith<$Res> {
  __$$_PolaMakanCopyWithImpl(
      _$_PolaMakan _value, $Res Function(_$_PolaMakan) _then)
      : super(_value, (v) => _then(v as _$_PolaMakan));

  @override
  _$_PolaMakan get _value => super._value as _$_PolaMakan;

  @override
  $Res call({
    Object? id = freezed,
    Object? category = freezed,
    Object? dilarang = freezed,
    Object? dianjurkan = freezed,
  }) {
    return _then(_$_PolaMakan(
      id: id == freezed
          ? _value.id
          : id // ignore: cast_nullable_to_non_nullable
              as int,
      category: category == freezed
          ? _value.category
          : category // ignore: cast_nullable_to_non_nullable
              as String,
      dilarang: dilarang == freezed
          ? _value.dilarang
          : dilarang // ignore: cast_nullable_to_non_nullable
              as String,
      dianjurkan: dianjurkan == freezed
          ? _value.dianjurkan
          : dianjurkan // ignore: cast_nullable_to_non_nullable
              as String,
    ));
  }
}

/// @nodoc
@JsonSerializable()
class _$_PolaMakan implements _PolaMakan {
  _$_PolaMakan(
      {required this.id,
      required this.category,
      required this.dilarang,
      required this.dianjurkan});

  factory _$_PolaMakan.fromJson(Map<String, dynamic> json) =>
      _$$_PolaMakanFromJson(json);

  @override
  final int id;
  @override
  final String category;
  @override
  final String dilarang;
  @override
  final String dianjurkan;

  @override
  String toString() {
    return 'PolaMakan(id: $id, category: $category, dilarang: $dilarang, dianjurkan: $dianjurkan)';
  }

  @override
  bool operator ==(dynamic other) {
    return identical(this, other) ||
        (other.runtimeType == runtimeType &&
            other is _$_PolaMakan &&
            const DeepCollectionEquality().equals(other.id, id) &&
            const DeepCollectionEquality().equals(other.category, category) &&
            const DeepCollectionEquality().equals(other.dilarang, dilarang) &&
            const DeepCollectionEquality()
                .equals(other.dianjurkan, dianjurkan));
  }

  @JsonKey(ignore: true)
  @override
  int get hashCode => Object.hash(
      runtimeType,
      const DeepCollectionEquality().hash(id),
      const DeepCollectionEquality().hash(category),
      const DeepCollectionEquality().hash(dilarang),
      const DeepCollectionEquality().hash(dianjurkan));

  @JsonKey(ignore: true)
  @override
  _$$_PolaMakanCopyWith<_$_PolaMakan> get copyWith =>
      __$$_PolaMakanCopyWithImpl<_$_PolaMakan>(this, _$identity);

  @override
  Map<String, dynamic> toJson() {
    return _$$_PolaMakanToJson(this);
  }
}

abstract class _PolaMakan implements PolaMakan {
  factory _PolaMakan(
      {required final int id,
      required final String category,
      required final String dilarang,
      required final String dianjurkan}) = _$_PolaMakan;

  factory _PolaMakan.fromJson(Map<String, dynamic> json) =
      _$_PolaMakan.fromJson;

  @override
  int get id;
  @override
  String get category;
  @override
  String get dilarang;
  @override
  String get dianjurkan;
  @override
  @JsonKey(ignore: true)
  _$$_PolaMakanCopyWith<_$_PolaMakan> get copyWith =>
      throw _privateConstructorUsedError;
}
