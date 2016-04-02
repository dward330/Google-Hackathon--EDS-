//
//  PhotoLib.h
//  SCCF
//
//  Created by Kenneth Coury on 2/21/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface PhotoLib : UIViewController

<UINavigationControllerDelegate,UIImagePickerControllerDelegate> {
    
    IBOutlet UIImageView *ImageView;
    UIImagePickerController *picker;
    UIImage *image;
}

- (IBAction)PhotoLibary:(id)sender;

@end
