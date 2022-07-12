import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';

class CustommedButton extends StatelessWidget {
  String title;
  Function() onPress;
  CustommedButton({required this.onPress, required this.title});
  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.infinity,
      child: TextButton(
        style: TextButton.styleFrom(
            backgroundColor: primaryColor,
            shape:
                RoundedRectangleBorder(borderRadius: BorderRadius.circular(5))),
        child: Text(
          title,
          style: poppinstext.copyWith(
              fontSize: 14, fontWeight: semiBold, color: Colors.black),
        ),
        onPressed: onPress,
      ),
    );
  }
}
