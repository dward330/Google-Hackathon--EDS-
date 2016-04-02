//
//  Summary.m
//  SCCF
//
//  Created by Kenneth Coury on 2/22/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import "Summary.h"
#import "VariableStore.h"



@implementation Summary

@synthesize passedValue;
@synthesize mapview;




-(IBAction)back:(id)sender{
    MyLocationViewController *second = [[MyLocationViewController alloc]initWithNibName:nil bundle:nil];
    //[self presentModalMyLocationViewController:second animated:YES];
}



- (void)viewDidLoad
{
    

    
    descript.text = [[VariableStore sharedInstance] getDescription];
    firstName.text = [[VariableStore sharedInstance] getFName];
    adressy.text = [[VariableStore sharedInstance] getAddress];
    lastName.text = [[VariableStore sharedInstance] getLName];
    emailA.text = [[VariableStore sharedInstance] getEMail];
    pNumber.text = [[VariableStore sharedInstance] getPNum];
    zipCode.text = [[VariableStore sharedInstance] getZip];
    looVal.text = [[VariableStore sharedInstance] getLongitude];
    laaVal.text = [[VariableStore sharedInstance] getLattitude];
    hazard.text = [[VariableStore sharedInstance] getHazard];
   
    
    MKCoordinateRegion region = { {0.0, 0.0}, {0.0,0.0}};
    region.center.latitude = [[[VariableStore sharedInstance] getLattitude] doubleValue];
    region.center.longitude = [[[VariableStore sharedInstance] getLongitude] doubleValue];
    region.span.longitudeDelta = 0.01f;
    region.span.latitudeDelta = 0.01f;
    [mapview setRegion:region animated:YES];
    
    [imageView setImage:[[VariableStore sharedInstance] getImage]];
    
    
    [self writeFNToFile:firstName.text];
    [self writeLNToFile:lastName.text];
    [self writePNToFile:pNumber.text];
    [self writeEMToFile:emailA.text];
    [self writeZCToFile:zipCode.text];
  

    
 
    // Do any additional setup after loading the view, typically from a nib.
    
    
       
    [super viewDidLoad];
    
    self->scrollyV.contentSize = CGSizeMake(0, 350);


    
    
    UIImage *statusImage = [UIImage imageNamed:@"1act1222 copy.png"];
    UIImageView *activityImageView = [[UIImageView alloc]
                                      initWithImage:statusImage];

    //Add more images which will be used for the animation
    activityImageView.animationImages = [NSArray arrayWithObjects:
                                         [UIImage imageNamed:@"1act1222.png"],
                                         
                                         [UIImage imageNamed:@"act22.png"],
                                         
                                         [UIImage imageNamed:@"act32.png"],
                                         
                                         [UIImage imageNamed:@"act40 cpy22.png"],
                                         
                                         [UIImage imageNamed:@"act42 z.png"],
                                          
                                          [UIImage imageNamed:@"act55.png"],
                                          
                                          [UIImage imageNamed:@"act62.png"],
                                          
                                          [UIImage imageNamed:@"act72.png"],
                                          
                                          [UIImage imageNamed:@"act82.png"],
                                          
                                          [UIImage imageNamed:@"act92.png"],
                                          
                                          [UIImage imageNamed:@"act112.png"],
                                          
                                          [UIImage imageNamed:@"act122.png"],
                                          
                                          [UIImage imageNamed:@"act132.png"],
                                          
                                          [UIImage imageNamed:@"act142.png"],
                                          
                                          [UIImage imageNamed:@"act152.png"],
                                          
                                          [UIImage imageNamed:@"act162.png"],
                                         
                                         [UIImage imageNamed:@"1act1111.png"],
                                          
                                          [UIImage imageNamed:@"act21.png"],
                                          
                                          [UIImage imageNamed:@"act31.png"],
                                          
                                          [UIImage imageNamed:@"act40 cpy21.png"],
                                          
                                          [UIImage imageNamed:@"act41 z.png"],
                                           
                                           [UIImage imageNamed:@"act51.png"],
                                           
                                           [UIImage imageNamed:@"act61.png"],
                                           
                                           [UIImage imageNamed:@"act71.png"],
                                           
                                           [UIImage imageNamed:@"act81.png"],
                                           
                                           [UIImage imageNamed:@"act91.png"],
                                           
                                           [UIImage imageNamed:@"act111.png"],
                                           
                                           [UIImage imageNamed:@"act121.png"],
                                           
                                           [UIImage imageNamed:@"act131.png"],
                                           
                                           [UIImage imageNamed:@"act141.png"],
                                           
                                           [UIImage imageNamed:@"act151.png"],
                                           
                                           [UIImage imageNamed:@"act161.png"],
                                            
                                            [UIImage imageNamed:@"1act1.png"],
                                            
                                            [UIImage imageNamed:@"act2.png"],
                                            
                                            [UIImage imageNamed:@"act3.png"],
                                            
                                            [UIImage imageNamed:@"act4 cpy2.png"],
                                            
                                            [UIImage imageNamed:@"act4 z.png"],
                                             
                                             [UIImage imageNamed:@"act5.png"],
                                             
                                             [UIImage imageNamed:@"act6.png"],
                                             
                                             [UIImage imageNamed:@"act7.png"],
                                             
                                             [UIImage imageNamed:@"act8.png"],
                                             
                                             [UIImage imageNamed:@"act9.png"],
                                             
                                             [UIImage imageNamed:@"act11.png"],
                                             
                                             [UIImage imageNamed:@"act12.png"],
                                             
                                             [UIImage imageNamed:@"act13.png"],
                                             
                                             [UIImage imageNamed:@"act14.png"],
                                             
                                             [UIImage imageNamed:@"act15.png"],
                                             
                                             [UIImage imageNamed:@"act16.png"],
                                              
                                              [UIImage imageNamed:@"1act1333.png"],
                                               
                                               [UIImage imageNamed:@"act23.png"],
                                               
                                               [UIImage imageNamed:@"act33.png"],
                                               
                                               [UIImage imageNamed:@"act40 cpy23.png"],
                                               
                                               [UIImage imageNamed:@"act43 z.png"],
                                                
                                                [UIImage imageNamed:@"act53.png"],
                                                
                                                [UIImage imageNamed:@"act63.png"],
                                                
                                                [UIImage imageNamed:@"act73.png"],
                                                
                                                [UIImage imageNamed:@"act83.png"],
                                                
                                                [UIImage imageNamed:@"act93.png"],
                                                
                                                [UIImage imageNamed:@"act113.png"],
                                                
                                                [UIImage imageNamed:@"act123.png"],
                                                
                                                [UIImage imageNamed:@"act133.png"],
                                                
                                                [UIImage imageNamed:@"act143.png"],
                                                
                                                [UIImage imageNamed:@"act153.png"],
                                                
                                                [UIImage imageNamed:@"act163.png"],nil];
                                               


                                         
    activityImageView.alpha = 1.0;
    activityImageView.animationDuration = .8;
    activityImageView.frame = CGRectMake(-8, 0, 59, 58);
    [activityImageView startAnimating];
    [activityind addSubview:activityImageView];
   
    
}


/*
 DERRICK - THIS METHOD IS FOR YOU!
 I made everything NSStrings except the image
 you may need to convert to other values, not
 sure what things look like on your end.
 
 There is a button on this screen called
 "SEND DATA", pressing that will make the method
 below run. Lets just use this for now to test things.
 */


// This method is used to receive the data which we get using post method.
- (void)connection:(NSURLConnection *)connection didReceiveData:(NSData*)data{
    [self.receivedData appendData:data];
}

// This method receives the error report in case of connection is not made to server.
- (void)connection:(NSURLConnection *)connection didFailWithError:(NSError *)error{
    NSLog(@"%@", error);
}

// This method is used to process the data after connection has made successfully.
- (void)connectionDidFinishLoading:(NSURLConnection *)connection{
    //initialize convert the received data to string with UTF8 encoding
    NSString *htmlSTR = [[NSString alloc] initWithData:self.receivedData
                                              encoding:NSUTF8StringEncoding];
    NSLog(@"%@",htmlSTR);
}


- (void)writeFNToFile:(NSString*)aString {
    
    // Build the path, and create if needed.
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"fName.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    if (![[NSFileManager defaultManager] fileExistsAtPath:fileAtPath]) {
        [[NSFileManager defaultManager] createFileAtPath:fileAtPath contents:nil attributes:nil];
    }
    
    // The main act...
    [[aString dataUsingEncoding:NSUTF8StringEncoding] writeToFile:fileAtPath atomically:NO];
}

- (void)writeLNToFile:(NSString*)aString {
    
    // Build the path, and create if needed.
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"lName.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    if (![[NSFileManager defaultManager] fileExistsAtPath:fileAtPath]) {
        [[NSFileManager defaultManager] createFileAtPath:fileAtPath contents:nil attributes:nil];
    }
    
    // The main act...
    [[aString dataUsingEncoding:NSUTF8StringEncoding] writeToFile:fileAtPath atomically:NO];
}

- (void)writePNToFile:(NSString*)aString {
    
    // Build the path, and create if needed.
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"pNum.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    if (![[NSFileManager defaultManager] fileExistsAtPath:fileAtPath]) {
        [[NSFileManager defaultManager] createFileAtPath:fileAtPath contents:nil attributes:nil];
    }
    
    // The main act...
    [[aString dataUsingEncoding:NSUTF8StringEncoding] writeToFile:fileAtPath atomically:NO];
}

- (void)writeEMToFile:(NSString*)aString {
    
    // Build the path, and create if needed.
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"eMail.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    if (![[NSFileManager defaultManager] fileExistsAtPath:fileAtPath]) {
        [[NSFileManager defaultManager] createFileAtPath:fileAtPath contents:nil attributes:nil];
    }
    
    // The main act...
    [[aString dataUsingEncoding:NSUTF8StringEncoding] writeToFile:fileAtPath atomically:NO];
}

- (void)writeZCToFile:(NSString*)aString {
    
    // Build the path, and create if needed.
    NSString* filePath = [NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES) objectAtIndex:0];
    NSString* fileName = @"zCode.txt";
    NSString* fileAtPath = [filePath stringByAppendingPathComponent:fileName];
    
    if (![[NSFileManager defaultManager] fileExistsAtPath:fileAtPath]) {
        [[NSFileManager defaultManager] createFileAtPath:fileAtPath contents:nil attributes:nil];
    }
    
    // The main act...
    [[aString dataUsingEncoding:NSUTF8StringEncoding] writeToFile:fileAtPath atomically:NO];
}



- (IBAction)sendIt:(id)sender {
    submitting.hidden = NO;
    senditt.enabled = NO;
    back.enabled = NO;
    
    
    //Loading screen
    [activityind startAnimating];

    
    
    //this is where i bring in all of the global variables
    NSString *firstName = [[VariableStore sharedInstance] getFName];
    NSString *adressy = [[VariableStore sharedInstance] getAddress];
    NSString *lastName = [[VariableStore sharedInstance] getLName];
    NSString *eMail = [[VariableStore sharedInstance] getEMail];
    NSString *phoneNum = [[VariableStore sharedInstance] getPNum];
    NSString *zipCode = [[VariableStore sharedInstance] getZip];
    NSString *longitude = [[VariableStore sharedInstance] getLongitude];
    NSString *lattitude = [[VariableStore sharedInstance] getLattitude];
    NSString *hazard = [[VariableStore sharedInstance] getHazard];
    NSString *description = [[VariableStore sharedInstance] getDescription];
    
    //NSString *url = @"http://edsapplb-1862368837.us-west-2.elb.amazonaws.com/";
    NSMutableData *data = [[NSMutableData alloc] init];
    //self.receivedData = data;
    
    CGSize newSize = CGSizeMake(612.0f, 816.0f);
    
    UIGraphicsBeginImageContext(newSize);
    [[[VariableStore sharedInstance] getImage] drawInRect:CGRectMake(0,0,newSize.width,newSize.height)];
    UIImage* newImage = UIGraphicsGetImageFromCurrentImageContext();
    UIGraphicsEndImageContext();
    
    //*** ^PUT YOUR CODE BELOW, USE VARIABLES ABOVE^ ***
    
    /* CREATING REQUEST URL
    //NSString *queryString = [NSString stringWithFormat:url];
    NSMutableURLRequest *theRequest=[NSMutableURLRequest
                                     requestWithURL:[NSURL URLWithString:
                                                     url]
                                     cachePolicy:NSURLRequestUseProtocolCachePolicy
                                     timeoutInterval:60.0];*/
    
    NSString *EnvironmentIssue = [NSString stringWithFormat:@"{\"address\" : \"%@\", \"firstName\" : \"%@\", \"lastName\" : \"%@\", \"phoneNumber\" : \"%@\", \"email\" : \"%@\", \"zipCode\" : \"%@\", \"issueType\" : \"%@\", \"description\" : \"%@\", \"longitude\" : \"%@\", \"latitude\" : \"%@\"}",adressy,firstName, lastName, phoneNum, eMail, zipCode, hazard, description, longitude, lattitude];
    
    //NSLog(@"JSON Data:\n%@",EnvironmentIssue);
    
    /* SETTING THE TYPE OF HTTP REQUEST METHOD WE WANT */
    //[theRequest setHTTPMethod:@"POST"];
    
    /* Set Response Header */
    //[theRequest setValue:@"application/json" forHTTPHeaderField:@"Content-Type"];
    
    /* Set the Body of the Request
    NSData *requestData = [EnvironmentIssue dataUsingEncoding:NSUTF8StringEncoding];
    [theRequest setHTTPBody:requestData];*/
    
    /*
    NSURLConnection *connection = [[NSURLConnection alloc] initWithRequest:theRequest delegate:self];
    if (connection) {
        NSLog(@"Connection Successful");
        //_receivedData=[NSMutableData data];
    } else {
        printf("Connection could not be made");//something bad happened
    }
    
    
    //Image Uploading
    
    NSMutableURLRequest *request = [[NSMutableURLRequest alloc] initWithURL:[NSURL URLWithString:@"http://edsapplb-1862368837.us-west-2.elb.amazonaws.com/"]];
     */
    
    NSMutableURLRequest *request = [[NSMutableURLRequest alloc] initWithURL:[NSURL URLWithString:@"http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/"]];
    NSData *imageData = UIImageJPEGRepresentation(newImage, 1.0);
    
    [request setCachePolicy:NSURLRequestReloadIgnoringLocalCacheData];
    [request setHTTPShouldHandleCookies:NO];
    [request setTimeoutInterval:60];
    [request setHTTPMethod:@"POST"];
    NSString *boundary = @"unique-consistent-string";
    // set Content-Type in HTTP header
    NSString *contentType = [NSString stringWithFormat:@"multipart/form-data; boundary=%@", boundary];
    [request setValue:contentType forHTTPHeaderField: @"Content-Type"];
    // post body
    NSMutableData *body = [NSMutableData data];
    // add params (all params are strings)
    [body appendData:[[NSString stringWithFormat:@"--%@\r\n", boundary] dataUsingEncoding:NSUTF8StringEncoding]];
    [body appendData:[[NSString stringWithFormat:@"Content-Disposition: form-data; name=%@\r\n\r\n", @"Issue_Information"] dataUsingEncoding:NSUTF8StringEncoding]];
    [body appendData:[[NSString stringWithFormat:@"%@\r\n", EnvironmentIssue] dataUsingEncoding:NSUTF8StringEncoding]];
    // add image data
    if (imageData) {
        //create a unique file name
        double CurrentTime = CACurrentMediaTime();
        NSString* middle = [NSString stringWithFormat:@"%f",CurrentTime];
        middle = [middle stringByReplacingOccurrencesOfString:@"." withString:@""];
        middle = [NSString stringWithFormat:@"%@%@%@", [[VariableStore sharedInstance] getLName], middle, [[VariableStore sharedInstance] getHazard]];
        
        
        middle = [middle stringByReplacingOccurrencesOfString:@" " withString:@""];
        [body appendData:[[NSString stringWithFormat:@"--%@\r\n", boundary] dataUsingEncoding:NSUTF8StringEncoding]];
        [body appendData:[[NSString stringWithFormat:@"Content-Disposition: form-data; name=%@; filename=%@.jpg\r\n",@"Image", middle] dataUsingEncoding:NSUTF8StringEncoding]];
        [body appendData:[@"Content-Type: image/jpeg\r\n\r\n" dataUsingEncoding:NSUTF8StringEncoding]];
        [body appendData:imageData];
        [body appendData:[[NSString stringWithFormat:@"\r\n"] dataUsingEncoding:NSUTF8StringEncoding]];
    }
    [body appendData:[[NSString stringWithFormat:@"--%@--\r\n", boundary] dataUsingEncoding:NSUTF8StringEncoding]];
    // setting the body of the post to the reqeust
    [request setHTTPBody:body];
    // set the content-length
    NSString *postLength = [NSString stringWithFormat:@"%d", [body length]];
    [request setValue:postLength forHTTPHeaderField:@"Content-Length"];
    
    [NSURLConnection sendAsynchronousRequest:request queue:[NSOperationQueue currentQueue] completionHandler:^(NSURLResponse *response, NSData *data, NSError *error) {
        NSString* htmlSTR = @"bad";
        if(data.length > 0)
        {
            //success
            NSLog(@"greater than 0 bytes sent");
            
            htmlSTR = [[NSString alloc] initWithData:data encoding:NSUTF8StringEncoding];
            NSLog(@"%@",htmlSTR);
            
        }
        if(![htmlSTR  isEqual: @"bad"]){
            
            Summary *secondViewController =
            [self.storyboard instantiateViewControllerWithIdentifier:@"Submitted"];
            [self presentViewController:secondViewController animated:YES completion:nil];
        }
        else{
            NSLog(@"BAD!");
            UIAlertView *alert = [[UIAlertView alloc] initWithTitle:@"Submission Failed!"
                                                            message:@"Unable to Reach Server"
                                                           delegate:nil
                                                  cancelButtonTitle:@"OK"
                                                  otherButtonTitles:nil];
            [alert show];
            
        }
    }];

}
@end
