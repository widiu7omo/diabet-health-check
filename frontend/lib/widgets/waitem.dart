import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';

class WaItem extends StatelessWidget {
  String name;
  WaItem({required this.name});
  @override
  Widget build(BuildContext context) {
    return Container(
      margin: EdgeInsets.only(bottom: 24),
      padding: EdgeInsets.symmetric(horizontal: 12),
      height: 43,
      decoration: BoxDecoration(
          color: bgColor,
          border: Border.all(color: Colors.black),
          borderRadius: BorderRadius.circular(6)),
      child: Row(
        children: [
          Container(
            height: 26,
            width: 26,
            decoration: BoxDecoration(
                image: DecorationImage(image: AssetImage("assets/waitem.png"))),
          ),
          SizedBox(
            width: 12,
          ),
          Text(
            name,
            style: poppinstext.copyWith(fontSize: 16, fontWeight: semiBold),
          )
        ],
      ),
    );
  }
}
