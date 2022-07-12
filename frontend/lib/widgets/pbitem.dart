import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';

class PolaObatItem extends StatelessWidget {
  String title;
  String desc;
  String detail;
  Function() onPress;

  PolaObatItem(
      {required this.title,
      required this.desc,
      required this.detail,
      required this.onPress});

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: onPress,
      child: Container(
        height: 86,
        margin: EdgeInsets.only(bottom: 16),
        decoration: BoxDecoration(
            color: boxColor,
            borderRadius: BorderRadius.circular(5),
            border: Border.all(color: Colors.black)),
        padding: EdgeInsets.symmetric(vertical: 8, horizontal: 8),
        child: Stack(
          children: [
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  title,
                  style:
                      poppinstext.copyWith(fontSize: 12, fontWeight: semiBold),
                ),
                Text(
                  desc,
                  style: poppinstext.copyWith(
                    fontSize: 12,
                    fontWeight: medium,
                  ),
                )
              ],
            ),
            Align(
              alignment: Alignment.bottomRight,
              child: Container(
                child: Text(
                  detail,
                  style:
                      poppinstext.copyWith(fontSize: 12, fontWeight: semiBold),
                ),
              ),
            )
          ],
        ),
      ),
    );
  }
}
