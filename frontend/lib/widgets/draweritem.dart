import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';

class DrawerItem extends StatelessWidget {
  String title;
  String img;
  Function() onPress;

  DrawerItem({required this.title, required this.img, required this.onPress});
  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: onPress,
      child: Container(
        margin: EdgeInsets.only(bottom: 12),
        child: Row(
          children: [
            Container(
              width: 30,
              height: 30,
              decoration:
                  BoxDecoration(image: DecorationImage(image: AssetImage(img))),
            ),
            SizedBox(
              width: 8,
            ),
            Text(
              title,
              style: poppinstext.copyWith(
                  fontSize: 16, fontWeight: semiBold, color: Colors.black),
            )
          ],
        ),
      ),
    );
  }
}
