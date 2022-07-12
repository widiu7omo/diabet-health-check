import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';

class HeaderCustom extends StatelessWidget {
  Function() onPress;
  bool openend;
  HeaderCustom({required this.onPress, this.openend = false});
  @override
  Widget build(BuildContext context) {
    return Container(
      height: 50,
      color: primaryColor,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/home");
            },
            child: Container(
              width: 50,
              height: 50,
              decoration: BoxDecoration(
                  image: DecorationImage(
                      image: AssetImage("assets/homelogo.png"))),
            ),
          ),
          GestureDetector(
            onTap: onPress,
            child: Container(
              margin: EdgeInsets.only(right: 13),
              width: 24,
              height: 24,
              decoration: BoxDecoration(
                  image: DecorationImage(
                      image: AssetImage(
                          openend ? "assets/cross.png" : "assets/bar.png"))),
            ),
          ),
        ],
      ),
    );
  }
}
