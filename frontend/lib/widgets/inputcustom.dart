import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';

class CustommedInput extends StatelessWidget {
  String label;
  String hint;
  bool secure;
  TextEditingController controller;

  CustommedInput(
      {required this.hint,
      required this.label,
      this.secure = false,
      required this.controller});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: EdgeInsets.only(bottom: 10),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text(
            label,
            style: poppinstext.copyWith(
                fontSize: 14, fontWeight: medium, color: Colors.black),
          ),
          Container(
            height: 40,
            decoration: BoxDecoration(
                color: primaryColor, borderRadius: BorderRadius.circular(100)),
            child: TextFormField(
              obscureText: secure,
              controller: controller,
              decoration: InputDecoration(
                  border: InputBorder.none,
                  contentPadding: EdgeInsets.only(
                    left: 12,
                    right: 12,
                    bottom: 10,
                  ),
                  hintText: hint,
                  hintStyle: poppinstext.copyWith(fontSize: 12)),
            ),
          )
        ],
      ),
    );
  }
}
